const config = {
    development: {
        PORT: 1992,
    },
    production: {
        PORT: 80,
    }
}

module.exports = config[process.env.NODE_ENV.trim()];