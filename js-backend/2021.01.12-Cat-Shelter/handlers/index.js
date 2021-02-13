const staticHandler = require('./static-files');
const getHandler = require('./get');
const postHandler = require('./post');

module.exports = [staticHandler, getHandler, postHandler];