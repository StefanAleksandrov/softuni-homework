const router = require('express').Router();

//CONTROLLERS
const homeController = require('./controllers/homeController');
const authController = require('./controllers/authController');
const courseController = require('./controllers/courseController');

//SPLIT REQUESTS TO CONTROLLERS
router.use('/', homeController);
router.use('/auth', authController);
router.use('/course', courseController)

module.exports = router;