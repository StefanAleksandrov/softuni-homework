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
}

module.exports = validate;