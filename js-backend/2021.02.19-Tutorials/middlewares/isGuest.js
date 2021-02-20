function isAuthenticated (req, res, next) {
    if (req.user) {
         res.redirect('/');

    } else {
        next();
    }
}

module.exports = isAuthenticated;