const mongoose = require('mongoose');
const User = require('./User');

const cubeScheme = new mongoose.Schema({
    name: {
        type: String,
        required: true,
        minLength: 5,
        validate: {
            validator: /[a-zA-Z0-9\s]+/,
            message: "Cube name should consist of english letters, numbers and white spaces only!"
        }
    },
    description: {
        type: String,
        required: true,
        minLength: 20,
        validate: {
            validator: /[a-zA-Z0-9\s]+/,
            message: "Cube description should consist of english letters, numbers and white spaces only!"
        }
    },
    imageUrl: {
        type: String,
        required: true,
        validate: /^https?/i,
    },
    difficultyLevel: {
        type: Number,
        required: true,
        min: [1, 'Difficulty level is too low'],
        max: [6, 'Difficulty level is too high'],
    },
    accessories: [{
        type: mongoose.Types.ObjectId,
        ref: 'Accessory',
    }],
    creator: {
        type: mongoose.Types.ObjectId,
        ref: User,
    }
});

module.exports = mongoose.model('Cube', cubeScheme);