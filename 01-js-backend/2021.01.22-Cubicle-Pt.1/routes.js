const router = require('express').Router();

//CONTROLLERs
const productController = require('./controllers/productController');
const authController = require('./controllers/authController');

//HOME ROUTEs
router.use('/', productController);

//AUTH ROUTEs
router.use('/auth', authController);

// NOT FOUND ROUTEs
router.get('*', (req, res) => {
    res.render('404', { layout: 'main.hbs', title: 'Not Found' });
});

module.exports = router;