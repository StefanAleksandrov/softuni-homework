function errorHandler() {
    return (err, req, res, next) => {
        if (err) {
            console.log('ERROR HANDLER: ', err);
            res.redirect('/');
        }

        next();
    }
}

module.exports = errorHandler;