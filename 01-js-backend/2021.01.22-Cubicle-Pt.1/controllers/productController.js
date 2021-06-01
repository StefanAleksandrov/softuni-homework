const router = require('express').Router();
const productService = require('../services/productService');

//GET
router.get('/', (req, res) => {
    let cubes = [];

    if(req.query) {
        cubes = productService.getSome(req.query);

    } else {
        cubes = productService.getAll();
    }

    res.render('home', { layout: 'main', title: 'Cubicle Home', cubes });
});

router.get('/about', (req, res) => {
    res.render('about', { layout: 'main', title: 'Cubicle About' });
});

router.get('/create', (req, res) => {
    res.render('create', { layout: 'main', title: 'Cubicle Add' });
});

router.get('/details/:id', (req, res) => {
    let cube = productService.getOne(req.params.id);
    res.render('details', { layout: 'main', title: 'Cubicle Details', cube });
});

//POST
router.post('/create', (req, res) => {
    let messages = productService.create(req.body)
    let errors = messages.errors;
    let notifications = messages.notifications;

    console.log('Messages: ', messages);

    if (errors && errors.length > 0) {
        res.render('create', { layout: 'main', title: 'Cubicle Add', errors, name: req.body.name, description: req.body.description, imageUrl: req.body.imageUrl });
        return;
    }

    if (notifications && notifications.length > 0) {
        res.render('create', { layout: 'main', title: 'Cubicle Add', notifications });
        return;
    }
});

module.exports = router;