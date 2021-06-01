const Course = require('../models/Course');

module.exports = {
    create: (title, description, imageUrl, isPublic) => {
        let newCourse = new Course(title, description, imageUrl, isPublic)

        return newCourse.save();
    },

    getAll: () => {
        return Course.find({ isPublic: true }).sort({ createdAt: -1 }).lean();
    },

    getTopThree: () => {
        return Course.find({ isPublic: true }).sort({ usersEnrolled: -1 }).limit(3).lean();
    },

    getOne: (id) => {
        return Course.findById(id).lean();
    },

    enroll: (courseId, userId) => {
        return Course.findById({ _id: courseId })
            .then(course => {
                let enrolled = false;
                let usersEnrolled = course.usersEnrolled.map(x => x.toString());

                if (usersEnrolled.includes(userId)) enrolled = true;

                if (enrolled) {
                    throw ({ message: 'User is already enrolled for this course!' });

                } else {
                    course.usersEnrolled.push(userId);
                    return course.save();
                }
            })
    },

    delete: (id) => {
        return Course.deleteOne({ _id: id });
    },

    updateOne: (courseId, title, description, imageUrl, isPublic) => {
        return Course.findById({ _id: courseId })
            .then(course => {
                console.log(course);
                course.title = title;
                course.description = description;
                course.imageUrl = imageUrl;
                course.isPublic = isPublic;
                return course.save();
            })
    },
}