const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');
const { SALT_ROUNDS, SECRET } = require('../config/auth');
const User = require('../models/User');

async function checkUsername(username) {
    try {
        let user = await User.findOne({ username: username }).lean();
        return user;
    } catch (err) {
        return err
    }
}

async function login(username, password) {
    let user = await checkUsername(username);
    let comparepass;

    if (user != null) {
        try {
            comparePass = await bcrypt.compare(password, user.password);

            if (comparePass) {
                let token = jwt.sign({ _id: user._id, username: user.username }, SECRET);
                return token;
            } else {
                throw { msg: 'Invalid password!' }
            }

        } catch (err) {
            throw err;
        }
    }

    throw { msg: 'User not found!' };
}

async function register(username, password) {
    let user = await checkUsername(username);

    if (user == null) {
        let salt = await bcrypt.genSalt(SALT_ROUNDS);
        let hash = await bcrypt.hash(password, salt);

        const user = new User({ username, password: hash });

        return await user.save();

    } else {
        throw { msg: "User with the selected username already exists!" }
    }
}

module.exports = {
    checkUsername,
    register,
    login
}