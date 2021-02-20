const express = require('express')
const app = express();
const routes = require('./routes');
const globalErrHandler = require('./middlewares/globalErrorHandler');

const { PORT } = require('./config/config');

require('./config/mongoose');
require('./config/express')(app);

app.use(routes);
app.use(globalErrHandler);

app.listen(PORT, () => {
    console.log('Server is up and running on port ', PORT, ' Link: http://localhost:1991/');
})