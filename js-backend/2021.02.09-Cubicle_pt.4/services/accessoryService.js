const Accessory = require('../models/Accessory');

function getAll() {
    return Accessory.find({}).lean();
}

function getAllNotin(ids) {
    return Accessory.find({ _id: { $nin: ids } }).lean();
}

function getOne(id) {
    return Accessory.findById(id).lean();
}

function create(data) {
    const accessory = new Accessory(data);
    return accessory.save();
}

module.exports = {
    create,
    getAll,
    getAllNotin,
    getOne,
}