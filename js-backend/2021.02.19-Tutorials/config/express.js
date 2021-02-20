const express = require('express');
const hbs = require('express-handlebars');
const cookieParser = require('cookie-parser');

//MIDDLEWARES
const auth = require('../middlewares/auth');

module.exports = function (app) {
    //SETUP VIEW ENGINE- HANDLEBARS
    app.engine('hbs', hbs({
        extname: 'hbs',
        layoutsDir: 'views/layouts',
        partialsDir: 'views/partials',
    }));

    app.set('view engine', 'hbs');

    //SET ALL THE STATIC FILES LIKE CSS, IMGs etc.
    app.use('/static', express.static('static'));

    //READ dATA FROM REQ BODY
    app.use(express.urlencoded({extended: true}));

    //TO SET AND READ COOKIES
    app.use(cookieParser());

    //AUTHENTICATION
    app.use(auth);
}