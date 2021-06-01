const mongoose = require('mongoose');

const accessorySchema = new mongoose.Schema({
    name: {
        type: String,
        required: true,
        minLength: 3,
        maxLength: 25
    },
    description: {
        type: String,
        required: true,
        minLength: 3,
        maxLength: 100
    },
    imageUrl: {
        type: String,
        required: true,
        validate: /^https?/i
    }

});

module.exports = mongoose.model('Accessory', accessorySchema);