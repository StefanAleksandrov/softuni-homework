const User = require('../models/User');
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');
const { SECRET } = require('../config/config');

const auth = {
    register: (username, password, repeatPassword) => {
        if (password == repeatPassword) {
            let newUser = new User({ username, password });

            return newUser.save();
        }

        throw ({ message: "Passwords should match!", code: 400 })
    },

    login: async function (username, password, next) {
        if (!username) throw ({ message: 'Username is required!', status: 404 });

        let foundUser = await User.findOne({ username })
        if (!foundUser) throw { message: 'User not found!', status: 404 };

        let areEqual = await bcrypt.compare(password, foundUser.password);
        if (!areEqual) throw { message: 'Password is not valid!', status: 404 };

        let token = jwt.sign({ _id: foundUser._id, username: foundUser.username }, SECRET);
        return token;
    }
}

module.exports = auth;