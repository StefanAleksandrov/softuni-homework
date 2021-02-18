const router = require('express').Router();
const authService = require('../services/authService');
const validate = require('../validations/validator');
const { COOKIE_NAME } = require('../config/auth');

//MIDDLEWARES
const isGuest = require('../middlewares/isGuest');
const isAuthenticated = require('../middlewares/isAuthenticated');

// GET
router.get('/login', isAuthenticated(), (req, res) => {
    res.render('loginPage', { layout: 'main', title: 'Cubicle Login' });
});

router.get('/register', isAuthenticated(), (req, res) => {
    res.render('registerPage', { layout: 'main', title: 'Cubicle Register' });
});

router.get('/logout', isGuest(), (req, res) => {
    res.clearCookie(COOKIE_NAME);
    res.redirect('/');
});

// POST
router.post('/login', validate.login, (req, res) => {
    let errors, notifications;

    if (req.messages) {
        errors = req.messages.errors;
        notifications = req.messages.notifications;

        if (errors && errors.length > 0) {
            res.render('loginPage', { layout: 'main', title: 'Cubicle Login', errors, username: req.body.username, password: req.body.password });
            return;
        }

        if (notifications && notifications.length > 0) {
            res.render('loginPage', { layout: 'main', title: 'Cubicle Login', notifications });
            return;
        }
    }

    authService.login(req.body.username, req.body.password)
        .then(token => {
            res.cookie(COOKIE_NAME, token);
            res.redirect('/');
        })
        .catch(err => {
            res.render('loginPage', { layout: 'main', title: 'Cubicle Register', errors: [err], username: req.body.username, password: req.body.password });
            
        })
});

router.post('/register', validate.register, (req, res) => {
    let errors, notifications;

    if (req.messages) {
        errors = req.messages.errors;
        notifications = req.messages.notifications;

        if (errors && errors.length > 0) {
            res.render('registerPage', { layout: 'main', title: 'Cubicle Login', errors, username: req.body.username, password: req.body.password, repeatPassword: req.body.repeatPassword });
            return;
        }

        if (notifications && notifications.length > 0) {
            res.render('registerPage', { layout: 'main', title: 'Cubicle Register', notifications });
            return;
        }
    }

    authService.register(req.body.username, req.body.password)
        .then(resp => {
            res.redirect('/auth/login');

        })
        .catch(err => {
            res.render('registerPage', { layout: 'main', title: 'Cubicle Register', errors: [err], username: req.body.username, password: req.body.password, repeatPassword: req.body.repeatPassword });
        });
});

module.exports = router;