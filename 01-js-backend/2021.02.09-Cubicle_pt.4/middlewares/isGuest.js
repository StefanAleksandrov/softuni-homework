module.exports = function() {
    return (req, res, next) => {
        if (!req.user) {
            return res.redirect('/auth/login');
        }

        next();
    }
}