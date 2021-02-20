const router = require('express').Router();
const { check, body, validationResult } = require('express-validator')
const authService = require('../services/authService');
const { COOKIE_NAME } = require('../config/auth');

//MIDDLEWARES
const validate = require('../middlewares/validator');
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

router.post('/register',
    body('username', 'Username should be between 5 and 20 symbols!').exists().toLowerCase().isLength({ min: 5, max: 20 }),
    body('email', 'Please provide a valid email!').exists().isEmail(),
    body('password', 'Password should be between 5 and 20 symbols!').exists().isLength({ min: 5, max: 20 }),
    body('repeatPassword', 'Passwords should match!').exists().custom((value, { req }) => value == req.body.password),
    (req, res) => {
        // let errs = validationResult(req);

        // if (errs.errors.length > 0) {
        //     res.render('registerPage', { layout: 'main', title: 'Cubicle Login', errors: errs.errors, username: req.body.username, email: req.body.email, password: req.body.password, repeatPassword: req.body.repeatPassword });
        //     return;
        // }

        // let errors, notifications;

        // if (req.messages) {
        //     errors = req.messages.errors;
        //     notifications = req.messages.notifications;

        //     if (errors && errors.length > 0) {
        //         res.render('registerPage', { layout: 'main', title: 'Cubicle Login', errors, username: req.body.username, password: req.body.password, repeatPassword: req.body.repeatPassword });
        //         return;
        //     }

        //     if (notifications && notifications.length > 0) {
        //         res.render('registerPage', { layout: 'main', title: 'Cubicle Register', notifications });
        //         return;
        //     }
        // }

        authService.register(req.body.username, req.body.email, req.body.password, req.body.repeatPassword)
            .then(() => {
                res.redirect('/auth/login');

            })
            .catch(err => {
                let errors = [];

                for (const key in err.errors) {
                    if (Object.hasOwnProperty.call(err.errors, key)) {
                        if (err.errors[key].properties) {
                            errors.push({msg: err.errors[key].properties.message});
                        }
                    }
                }

                res.render('registerPage', {
                    layout: 'main',
                    title: 'Cubicle Register',
                    errors,
                    username: req.body.username,
                    email: req.body.email,
                    password: req.body.password,
                    repeatPassword: req.body.repeatPassword
                });
            });
    });

module.exports = router;