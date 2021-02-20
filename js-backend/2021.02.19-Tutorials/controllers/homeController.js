const router = require('express').Router();
const courseService = require('../services/courseService');

router.get('/', (req, res, next) => {
    if (req.user) {
        courseService.getAll()
            .then(courses => {
                courses = courses.map(course => {
                    course.createdAt = course.createdAt.split(" ").slice(0, 5).join(" ");
                    return course;
                })
                res.render('home', { layouts: 'main', courses });
            })
            .catch(next);

    } else {
        courseService.getTopThree()
            .then(courses => {
                courses = courses.map(course => {
                    course.createdAt = course.createdAt.split(" ").slice(0, 5).join(" ");
                    return course;
                })
                res.render('home', { layouts: 'main', courses });
            })
            .catch(next);
    }
});

module.exports = router;