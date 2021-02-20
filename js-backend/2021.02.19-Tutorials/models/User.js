const mongoose = require('mongoose');
const bcrypt = require('bcrypt');
const { SALT_ROUNDS } = require('../config/config');
const Course = require('./Course');

const userSchema = new mongoose.Schema({
    username: {
        type: String,
        required: true,
        unique: true,
    },
    password: {
        type: String,
        required: true,
        minlength: [5, 'Password should be at least 5 symbols']
    },
    enrolledCourse: [{
        type: mongoose.Types.ObjectId,
        ref: Course,
    }],

});

userSchema.pre('save', function (next) {
    bcrypt.genSalt(SALT_ROUNDS)
        .then(salt => {
            return bcrypt.hash(this.password, salt);
        })
        .then(hash => {
            this.password = hash;
            this.username = this.username.toLowerCase();
            next();
        })
        .catch(next);
})

module.exports = mongoose.model('User', userSchema);