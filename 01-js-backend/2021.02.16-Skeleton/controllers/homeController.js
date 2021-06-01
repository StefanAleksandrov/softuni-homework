const router = require('express').Router();

router.get('/', (req, res) => {
    res.render('home', { layouts: 'main' });
});

module.exports = router;