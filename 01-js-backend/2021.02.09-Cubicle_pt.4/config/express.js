const handlebars = require('express-handlebars');
const express = require('express');
const cookieParser = require('cookie-parser');
const auth = require('../middlewares/auth');

function setupExpress(app) {
    //SET UP HANDLEBARS
    app.engine('hbs', handlebars({
        extname: 'hbs',
        directory: 'views',
    }));
    app.set('view engine', 'hbs');

    //SEND FILES FROM PUBLIC FOLDER
    app.use(express.static('static'));

    app.use(express.urlencoded({
        extended: true,
    }));

    app.use(cookieParser());

    app.use(auth());
}

module.exports = setupExpress;
