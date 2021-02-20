const Cube = require('../models/Cube');
const Accessory = require('../models/Accessory');

async function getAll() {
    let cubes = await Cube.find({}).lean();
    return cubes;
}

function getOne(id) {
    return Cube.findById(id).lean();
}

function getOneWithAccessories(id) {
    return Cube.findById(id).populate('accessories').lean();
}

async function getSome(query) {
    let cubes = await Cube.find({}).lean();

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

function create (data, userId) {
    const cube = new Cube(Object.assign({}, data, { creator: userId }));
    return cube.save();
}

async function attachAccessory(cubeId, accessoryId) {
    let cube = await Cube.findById(cubeId);
    let accessory = await Accessory.findById(accessoryId);
    cube.accessories.push(accessory);
    return cube.save();
}

function updateOne(id, data) {
    return Cube.updateOne({ _id: id }, data);
}

function deleteOne (id) {
    return Cube.deleteOne({ _id: id});
}

module.exports = {
    create,
    getAll,
    getOne,
    getOneWithAccessories,
    getSome,
    attachAccessory,
    updateOne,
    deleteOne
}