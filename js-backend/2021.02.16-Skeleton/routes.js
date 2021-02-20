const router = require('express').Router();

//CONTROLLERS
const homeController = require('./controllers/homeController');
const authController = require('./controllers/authController');

//SPLIT REQUESTS TO CONTROLLERS
router.use('/', homeController);
router.use('/auth', authController);

module.exports = router;