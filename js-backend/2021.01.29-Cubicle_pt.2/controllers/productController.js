const router = require('express').Router();
const productService = require('../services/productService');
const accessoryService = require('../services/accessoryService');
const validate = require('../validations/validator');

//GET
router.get('/', (req, res) => {
    if (Object.values(req.query).length != 0) {
        productService.getSome(req.query)
            .then(cubes => res.render('home', { layout: 'main', title: 'Cubicle Home', cubes }))
            .catch(() => res.status(500).end());

    } else {
        productService.getAll()
            .then(cubes => res.render('home', { layout: 'main', title: 'Cubicle Home', cubes }))
            .catch(() => res.status(500).end());
    }

});

router.get('/about', (req, res) => {
    res.render('about', { layout: 'main', title: 'Cubicle About' });
});

router.get('/create', (req, res) => {
    res.render('create', { layout: 'main', title: 'Cubicle Add' });
});

router.get('/details/:id', (req, res) => {
    productService.getOneWithAccessories(req.params.id)
        .then(cube => {
            let accessories = cube.accessories;
            console.log(accessories);
            res.render('details', { layout: 'main', title: 'Cubicle Details', cube, accessories });
        })
        .catch(() => res.status(500).end());
});

router.get('/details/:id/attach', (req, res) => {
    productService.getOne(req.params.id)
        .then(cube => {
            accessoryService.getAllNotin(cube.accessories)
                .then(accessories => {
                    res.render('attachAccessory', { layout: 'main', title: 'Cubicle Attach Accessory', cube, accessories });
                })
            .catch(() => res.status(500).end());
        })
        .catch(() => res.status(500).end());

    accessoryService.getAll()
        .then(accessories => {
            productService.getOne(req.params.id)
                .then(cube => {
                    res.render('attachAccessory', { layout: 'main', title: 'Cubicle Attach Accessory', cube, accessories });
                })
                .catch(() => res.status(500).end());
        })
        .catch(() => res.status(500).end());
});

//POST
router.post('/create', validate.cube, (req, res) => {
    let errors, notifications;

    if (req.messages) {
        errors = req.messages.errors;
        notifications = req.messages.notifications;

        if (errors && errors.length > 0) {
            res.render('create', { layout: 'main', title: 'Cubicle Add', errors, name: req.body.name, description: req.body.description, imageUrl: req.body.imageUrl });
            return;
        }

        if (notifications && notifications.length > 0) {
            res.render('create', { layout: 'main', title: 'Cubicle Add', notifications });
            return;
        }
    }

    productService.create(req.body)
        .then(() => res.redirect('/'))
        .catch(() => res.status(500).end());
});

router.post('/details/:id/attach', (req, res) => {
    productService.attachAccessory(req.params.id, req.body.accessory)
        .then(() => {
            res.redirect(`/details/${req.params.id}`);
        })
        .catch(() => res.status(500).end());
});

module.exports = router;