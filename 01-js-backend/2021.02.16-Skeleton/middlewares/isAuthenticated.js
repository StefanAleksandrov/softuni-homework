function isAuthenticated (req, res, next) {
    console.log(req.user);
    if (!req.user) {
         res.redirect('/auth/login');

    } else {
        console.log("HERE");
        next();
    }
}

module.exports = isAuthenticated;