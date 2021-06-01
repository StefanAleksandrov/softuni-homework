const express = require('express');
const config = require('./config/config');
const routes = require('./routes');

const app = express();

require('./config/express')(app);

app.use(routes);

//SERVER START
app.listen(config.PORT, () => {

}, console.log("Server is up and running on port: ", config.PORT, " Enviroment: ", process.env.NODE_ENV));