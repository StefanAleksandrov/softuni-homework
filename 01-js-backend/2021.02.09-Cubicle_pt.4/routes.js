const router = require('express').Router();

//CONTROLLERs
const productController = require('./controllers/productController');
const accessoriesController = require('./controllers/accessoriesController');
const authController = require('./controllers/authController');

//HOME ROUTEs
router.use('/', productController);

//ACCESORIEs ROUTEs
router.use('/accessories', accessoriesController);

//AUTH ROUTEs
router.use('/auth', authController);

// NOT FOUND ROUTEs
router.get('*', (req, res) => {
    res.render('404', { layout: 'main.hbs', title: 'Not Found' });
});

module.exports = router;