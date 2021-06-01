const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');
const { SECRET } = require('../config/auth');
const User = require('../models/User');

async function checkUsername(username, email = null) {
    try {
        let user = await User.findOne({ username: username }).lean();

        if(email != null) {
            let userEmail = await User.findOne({ email: email }).lean();
            user = userEmail ? user : userEmail;
        }

        return user;
    } catch (err) {
        return err;
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

async function register(username, email, password, repeatPassword) {
    let user = await checkUsername(username, email);

    if (user == null) {
        const newUser = new User({ username, email, password, repeatPassword });
        return await newUser.save();

    } else {
        throw { msg: "User with the selected username / email already exists!" }
    }
}

module.exports = {
    checkUsername,
    register,
    login
}