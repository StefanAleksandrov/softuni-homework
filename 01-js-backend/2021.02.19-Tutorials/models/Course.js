const mongoose = require('mongoose');
const User = require('./User');

const courseSchema = new mongoose.Schema({
    title: {
        type: String,
        required: true,
        unique: true,
    },
    description: {
        type: String,
        required: true,
        maxlength: [50, 'Course Description too long (up to 50 symbols).'],
    },
    imageUrl: {
        type: String,
        required: true,
    },
    isPublic: {
        type: Boolean,
        default: false,
    },
    createdAt: {
        type: String,
        required: true,
        default: new Date()
    },
    creator: {
        type: mongoose.Types.ObjectId,
        ref: User,
    },
    usersEnrolled: [{
        type: mongoose.Types.ObjectId,
        ref: User,
    }]
});

module.exports = mongoose.model('Course', courseSchema);