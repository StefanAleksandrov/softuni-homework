const mongoose = require('mongoose');

const userSchema = new mongoose.Schema({
    id: mongoose.Types.ObjectId,

    username: {
        type: String,
        required: true,
        unique: true,
        minLength: 3,
        maxLength: 20
    },
    
    password: {
        type: String,
        required: true,
        minLength: 3,
        maxLength: 75
    }
});

module.exports = mongoose.model('User', userSchema);