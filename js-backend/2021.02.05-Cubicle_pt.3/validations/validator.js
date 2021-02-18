const validate = {
    cube(req, res, next) {
        let output = {
            errors: [],
            notifications: [],
        }

        const imageUrlRegex = /^https?:\/\/.*\.(?:png|jpg|jpeg)$/i;

        if (!req.body.name) {
            output.errors.push({ msg: 'Name is required!' });

        } else {
            if (Number(req.body.name) > 0) {
                output.errors.push({ msg: 'Name should be a string!' });
            }

            if (req.body.name.length < 3) {
                output.errors.push({ msg: 'Name should be 3 symbols or more!' });
            }
        }

        if (!req.body.description) {
            output.errors.push({ msg: 'Description is required!' });

        } else {
            if (Number(req.body.description) > 0) {
                output.errors.push({ msg: 'Description should be a string!' });
            }

            if (req.body.description.length < 10) {
                output.errors.push({ msg: 'Description should be 10 symbols or more!' });
            }
        }

        if (!req.body.imageUrl) {
            output.errors.push({ msg: 'Image URL is required!' });

        } else if (!imageUrlRegex.test(req.body.imageUrl)) {
            output.errors.push({ msg: 'Image URL is not valid!' });
        }

        if (output.errors.length > 0) {
            req.messages = output;
        }

        next();
    },

    accessory(req, res, next) {
        let output = {
            errors: [],
            notifications: [],
        }

        const imageUrlRegex = /^https?:\/\/.*\.(?:png|jpg|jpeg)$/i;

        if (!req.body.name) {
            output.errors.push({ msg: 'Name is required!' });

        } else {
            if (Number(req.body.name) > 0) {
                output.errors.push({ msg: 'Name should be a string!' });
            }

            if (req.body.name.length < 3) {
                output.errors.push({ msg: 'Name should be 3 symbols or more!' });
            }
        }

        if (!req.body.description) {
            output.errors.push({ msg: 'Description is required!' });

        } else {
            if (Number(req.body.description) > 0) {
                output.errors.push({ msg: 'Description should be a string!' });
            }

            if (req.body.description.length < 3) {
                output.errors.push({ msg: 'Description should be 10 symbols or more!' });
            }
        }

        if (!req.body.imageUrl) {
            output.errors.push({ msg: 'Image URL is required!' });

        } else if (!imageUrlRegex.test(req.body.imageUrl)) {
            output.errors.push({ msg: 'Image URL is not valid!' });
        }

        if (output.errors.length > 0) {
            req.messages = output;
        }

        next();
    },

    register(req, res, next) {
        let output = {
            errors: [],
            notifications: [],
        }

        let { username, password, repeatPassword } = req.body;

        if (username.length < 3 || username.length > 20) {
            output.errors.push({ msg: "Username should be between 3 and 20 symbols!" });
        }

        if (Number(username) > 0) {
            output.errors.push({ msg: "Username should be string!" });
        }

        if (password.length < 3 || password.length > 20) {
            output.errors.push({ msg: "Password should be between 3 and 20 symbols!" });
        }

        if (password != repeatPassword) {
            output.errors.push({ msg: "Passwords should match!" });
        }

        if (output.errors.length > 0) {
            req.messages = output;
        }

        next();
    },

    login(req, res, next) {
        let output = {
            errors: [],
            notifications: [],
        }

        let { username, password } = req.body;

        if (username.length < 3 || username.length > 20) {
            output.errors.push({ msg: "Username should be between 3 and 20 symbols!" });
        }

        if (Number(username) > 0) {
            output.errors.push({ msg: "Username should be string!" });
        }

        if (password.length < 3 || password.length > 20) {
            output.errors.push({ msg: "Password should be between 3 and 20 symbols!" });
        }

        if (output.errors.length > 0) {
            req.messages = output;
        }

        next();
    }
}

module.exports = validate;