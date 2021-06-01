const mongoose = require('mongoose');
const bcrypt = require('bcrypt');
const { schema } = require('./Cube');
const { SALT_ROUNDS } = require('../config/auth');

const userSchema = new mongoose.Schema({
    username: {
        type: String,
        required: [true, 'Username is required!'],
        unique: [true, 'Username already exists!'],
        minLength: [5, 'Username should be at least 5 lowercase english letters and numbers!'],
        validate: {
            validator: (value) => {
                return /[a-z0-9]+/.test(value);
            },
            message: (props) => {
                return `${props.value} is invalid. Username should contain lowercase english letters and numbers only!`
            }
        }
    },

    email: {
        type: String,
        required: [true, 'Email is required!'],
        unique: [true, 'User with the selected email already exists!'],
        minLength: [5, 'Email should be at least 5 symbols!'],
        validate: {
            validator: /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/,
            message: "Email format is not valid",
        }
    },

    password: {
        type: String,
        required: [true, 'Password is required!'],
        minLength: [8, 'Password should be at least 8 lowercase/uppercase english letters and numbers!'],
        validate: {
            validator: /[a-zA-Z0-9]+/,
            message: "Password should contain lowercase/uppercase english letters and numbers only!"
        }
    },

    repeatPassword: {
        type: String,
        validate: {
            validator: (value) => {
                return (value == 'true');
            },
            message: 'Passwords should match!'
        }
    }
});

userSchema.pre('validate', function (next) {
    this.repeatPassword = (this.password == this.repeatPassword) ? true : false;

    next();
})

userSchema.pre('save', function (next) {

    bcrypt.genSalt(SALT_ROUNDS)
        .then(salt => {
            return bcrypt.hash(this.password, salt)
        })
        .then(hash => {
            this.password = hash;
            next();
        })
        .catch(err => {
            //TODO
            console.log('User model, hashing password pre-save ERROR: ', err);
        })
});

module.exports = mongoose.model('User', userSchema);