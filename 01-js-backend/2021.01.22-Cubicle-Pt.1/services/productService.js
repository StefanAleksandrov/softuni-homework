const Cube = require('../models/Cube');
const fs = require('fs');
const path = require('path');
//REQUIRE CAN BE USED AS fs.readFile
const cubesDB = require('../database/cubes.json');

let absolutePath = String(__dirname).split('\\');
absolutePath.pop();
absolutePath = absolutePath.join('/');

const imageUrlRegex = /^https?:\/\/.*\.(?:png|jpg|jpeg)$/i

function getAll() {
    return cubesDB;
}

function getOne(id) {
    let cube = cubesDB.filter((cube) => cube.id == id);
    return cube[0];
}

function getSome(query) {
    let cubes = cubesDB;

    if (query.search) {
        cubes = cubes.filter((el) => el.name.toLowerCase().includes(query.search.toLowerCase()));
    }

    if (query.from) {
        cubes = cubes.filter((el) => el.difficultyLevel >= query.from);
    }

    if (query.to) {
        cubes = cubes.filter((el) => el.difficultyLevel <= query.to);
    }

    return cubes;
}

function create(data) {
    let output = {
        errors: [],
        notifications: []
    }

    if (!data.name) {
        output.errors.push({ msg: 'Name is required!' });

    } else {
        if (Number(data.name) > 0) {
            output.errors.push({ msg: 'Name should be a string!' });
        }

        if (data.name.length < 3) {
            output.errors.push({ msg: 'Name should be 3 symbols or more!' });
        }
    }

    if (!data.description) {
        output.errors.push({ msg: 'Description is required!' });

    } else {
        if (Number(data.description) > 0) {
            output.errors.push({ msg: 'Description should be a string!' });
        }

        if (data.description.length < 10) {
            output.errors.push({ msg: 'Description should be 10 symbols or more!' });
        }

    }

    if (!data.imageUrl) {
        output.errors.push({ msg: 'Image URL is required!' });

    } else if (!imageUrlRegex.test(data.imageUrl)) {
        output.errors.push({ msg: 'Image URL is not valid!' });
    }

    if (output.errors.length > 0) {
        return output;

    } else {
        //CREATE NEW CUBE
        const newCube = new Cube(data.name, data.description, data.imageUrl, data.difficultyLevel);
        newCube.id = Math.ceil(Math.random() * 1000);
        cubesDB.push(newCube);

        fs.writeFile((absolutePath + "/database/cubes.json"), JSON.stringify(cubesDB), (err) => {
            if (err) {
                res.render('404', err);
            }
        });

        output.notifications.push({ msg: "Cube created!" });
        return output;
    }
}

module.exports = {
    create,
    getAll,
    getOne,
    getSome,
}