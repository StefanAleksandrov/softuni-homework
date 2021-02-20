const router = require('express').Router();
const courseService = require('../services/courseService');
const isAuthenticated = require('../middlewares/isAuthenticated');

//GET
router.get('/create', isAuthenticated, (req, res) => {
    res.render('createCourse');
});

router.get('/:id/details', isAuthenticated, (req, res, next) => {
    courseService.getOne(req.params.id)
        .then(course => {
            let creator = false;
            let enrolled = false;
            course.usersEnrolled = course.usersEnrolled.map(x => x.toString());

            if (course.creator == req.user._id) creator = true;

            if (course.usersEnrolled.includes(req.user._id)) enrolled = true;

            res.render('courseDetails', { course, creator, enrolled });
        })
        .catch(next)
});

router.get('/:id/enroll', isAuthenticated, async function (req, res, next) {
    courseService.enroll(req.params.id, req.user._id)
        .then(() => {
            res.redirect(`/course/${req.params.id}/details`);
        })
        .catch(next);
});

router.get('/:id/delete', isAuthenticated, async function (req, res, next) {
    courseService.delete(req.params.id)
        .then(() => {
            res.redirect('/');
        })
        .catch(next);
});

router.get('/:id/edit', isAuthenticated, async function (req, res, next) {
    courseService.getOne(req.params.id)
        .then(course => {
            res.render('courseEdit', { course, checked: course.isPublic ? 'checked' : '' });
        })
        .catch(next);
});

//POST
router.post('/create', isAuthenticated, (req, res, next) => {
    let { title, description, imageUrl, isPublic } = req.body;
    isPublic = !!isPublic;
    let creator = req.user._id;

    courseService.create({ title, description, imageUrl, isPublic, creator })
        .then(() => {
            res.redirect('/');
        })
        .catch(next);
});

router.post('/:id/edit', isAuthenticated, async function (req, res, next) {
    let { title, description, imageUrl, isPublic } = req.body;
    isPublic = !!isPublic;
    let creator = req.user._id;
    let courseId = req.params.id;

    courseService.updateOne(courseId, title, description, imageUrl, isPublic, creator)
        .then(() => {
            res.redirect('/');
        })
        .catch(next);
});

module.exports = router;