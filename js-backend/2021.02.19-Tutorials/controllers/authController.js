const router = require('express').Router();
const { COOKIE_NAME } = require('../config/config');
const authService = require('../services/authService');

//ROUTE GUARDS
const isAuthenticated = require('../middlewares/isAuthenticated');
const isGuest = require('../middlewares/isGuest');

//GET
router.get('/login', isGuest, (req, res) => {
    res.render('login', { layouts: 'main' });
});

router.get('/logout', isAuthenticated, (req, res) => {
    res.clearCookie(COOKIE_NAME);
    res.redirect('/');
});

router.get('/register', isGuest, (req, res) => {
    res.render('register', { layouts: 'main' });
});

router.get('/secret', isAuthenticated, (req, res) => {
    res.send("THIS IS MY SECRET! ONLY LOGGED IN USERS CAN SEE IT!");
})

//POST
router.post('/login', (req, res, next) => {
    let { username, password } = req.body;
    authService.login(username.toLowerCase(), password)
        .then(token => {
            res.cookie(COOKIE_NAME, token, { httpOnly: true });
            res.redirect('/');
        })
        .catch(next);
});

router.post('/register', function (req, res, next) {
    let { username, password, repeatPassword } = req.body;
    authService.register(username, password, repeatPassword)
        .then(() => {
            res.redirect('/auth/login');
        })
        .catch(err => {
            next(err);
        });
});

module.exports = router;