const router = require('express').Router();
const accessoryService = require('../services/accessoryService');
const validate = require('../validations/validator');

//GET
router.get('/', (req, res) => {
    res.write("Accessories under construction...")
    res.end();
    return;

    accessoryService.getAll()
        .then(accessories => res.render('', { layout: 'main', title: 'Cubicle Home', accessories }))
        .catch(() => res.status(500).end());

});

router.get('/create', (req, res) => {
    res.render('createAccessory', { layout: 'main', title: 'Cubicle Add' });
});

//POST
router.post('/create', validate.accessory, (req, res) => {
    let errors, notifications;

    if (req.messages) {
        errors = req.messages.errors;
        notifications = req.messages.notifications;

        if (errors && errors.length > 0) {
            res.render('createAccessory', { layout: 'main', title: 'Cubicle Add', errors, name: req.body.name, description: req.body.description, imageUrl: req.body.imageUrl });
            return;
        }

        if (notifications && notifications.length > 0) {
            res.render('createAccessory', { layout: 'main', title: 'Cubicle Add', notifications });
            return;
        }
    }

    accessoryService.create(req.body)
        .then(() => res.redirect('/'))
        .catch(() => res.status(500).end());
});

module.exports = router;