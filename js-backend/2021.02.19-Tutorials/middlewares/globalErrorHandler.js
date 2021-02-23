const globalErrorHandler = function (err, req, res, next) {
    const views = {
        '/auth/register': 'register',
        '/auth/login': 'login',
        '/course/create': 'createCourse',
    }

    err.message = err.message || 'Something went wrong';
    err.status = err.status || 500;
    let view = views[req.path] || 'home'

    res.status(err.status).render(view, { layouts: 'main', error: err });
}

module.exports = globalErrorHandler;