const router = require('express').Router();

router.get('/login', (req, res) => {
    res.render('login', { layout: 'main', title: 'Cubicle Login' });
});

router.get('/register', (req, res) => {
    res.render('register', { layout: 'main', title: 'Cubicle Register' });
});

module.exports = router;