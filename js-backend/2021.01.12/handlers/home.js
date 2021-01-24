const url = require('url');
const fs = require('fs');
const path = require('path');

const catsData = require("../data/cats.json");
const breedsData = require("../data/breeds.json");

module.exports = (req, res) => {
    const pathname = url.parse(req.url).pathname;

    switch (pathname) {
        case '/':
            let joinedPath = path.join(__dirname, '../views/home/index.html');
            let filePath = path.normalize(joinedPath);
            console.log(filePath);
            const data = fs.readFile(filePath, (err, data) => {
                if (err) {
                    console.log(err);

                    res.writeHead(404, {
                        'Content_Type': 'text/plain'
                    });
                    res.write('404');
                    res.end();
                } else {
                    res.writeHead(200, {
                        'Content_Type': 'text/html'
                    });
                    res.write(data);
                    res.end();
                }
            });
            break;
        case '/cats/add-breed':
            break;
        case '/cats/add-cat':
            break;
        default: return true;
    }
}