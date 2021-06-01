const http = require('http');
const port = 5000;
const handlers = require('./handlers/index');
const url = require('url');

http.createServer((req, res) => {
    if (url.parse(req.url).pathname == "/" || url.parse(req.url).pathname == "/cats/add-breed" || url.parse(req.url).pathname == "/cats/add-cat") {
        console.log("New request for:", url.parse(req.url).pathname,".Method:", req.method, ". Request was made from:", req.headers['user-agent']);
    }
    
    for (const handler of handlers) {
        // if(!handler(req, res)) {
        //     break;
        // }
        handler(req, res)
    }
}).listen(port, console.log("Server is up and running. Port:", port));