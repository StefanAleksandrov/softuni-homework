const express = require('express');
const config = require('./config/config');
const routes = require('./routes');
const errorHandler = require('./middlewares/globalErrorHandler');

const app = express();

require('./config/express')(app);
require('./config/mongoose')(app);

app.use(routes);

//GLOBAL ERR HANNDLER
app.use(errorHandler());

//SERVER START
app.listen(config.PORT, () => {

}, console.log("Server is up and running on port: ", config.PORT, " Enviroment: ", process.env.NODE_ENV));