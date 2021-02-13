const url = require('url');
const fs = require('fs');
const path = require('path');

const catsData = require("../data/cats.json");
const breedsData = require("../data/breeds.json");

module.exports = (req, res) => {
    const pathname = url.parse(req.url).pathname;
    let filePath, data;
    if(req.method !== "GET") return;

    switch (pathname) {
        case '/':
            filePath = path.normalize(path.join(__dirname, '../views/home/index.html'));
            data = fs.readFile(filePath, (err, data) => {
                if (err) {
                    console.log(err);

                    res.writeHead(404, {
                        'Content_Type': 'text/plain'
                    });
                    res.write('404');
                    res.end();
                } else {
                    fs.readFile(path.normalize(path.join(__dirname, '../data/cats.json')), (err, cats) => {
                        if (err) {
                            console.log(err);
        
                            res.writeHead(404, {
                                'Content_Type': 'text/plain'
                            });
                            res.write('404');
                            res.end();
                        }

                        let catPlaceholder = JSON.parse(cats).sort((a,b) => a.name.localeCompare(b.name)).map((cat) => `
                            <li id="${cat.id}">
                                <img src="${path.join( '../../content/images/' + cat.image )}" alt="${cat.name}">
                                <h3>${cat.name}</h3>
                                <p><span>Breed: </span>${cat.breed}</p>
                                <p><span>Description: </span>${cat.description}</p>
                                <ul class="buttons">
                                    <li class="btn edit"><a href="/cats/edit/${cat.id}">Change Info</a></li>
                                    <li class="btn delete"><a href="/cats/adopt/${cat.id}">New Home</a></li>
                                </ul>
                            </li>
                        `);
                        let modifiedData = data.toString().replace('{{cats}}', catPlaceholder);

                        res.writeHead(200, {
                            'Content_Type': 'text/html'
                        });
                        res.write(modifiedData);
                        res.end();
                    })
                }
            });
            break;
        case '/cats/add-breed':
            filePath = path.normalize(path.join(__dirname, '../views/addBreed.html'));
            data = fs.readFile(filePath, (err, data) => {
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
        case '/cats/add-cat':
            filePath = path.normalize(path.join(__dirname, '../views/addCat.html'));
            data = fs.readFile(filePath, (err, data) => {
                if (err) {
                    console.log(err);

                    res.writeHead(404, {
                        'Content_Type': 'text/plain'
                    });
                    res.write('404');
                    res.end();
                } else {
                    fs.readFile(path.normalize(path.join(__dirname, '../data/breeds.json')), (err, breeds) => {
                        if (err) {
                            console.log(err);
        
                            res.writeHead(404, {
                                'Content_Type': 'text/plain'
                            });
                            res.write('404');
                            res.end();
                        }

                        let catBreedPlaceholder = JSON.parse(breeds).sort((a,b) => a.localeCompare(b)).map((breed) => `<option value="${breed}">${breed}</option>`);
                        let modifiedData = data.toString().replace('{{catBreeds}}', catBreedPlaceholder);

                        res.writeHead(200, {
                            'Content_Type': 'text/html'
                        });
                        res.write(modifiedData);
                        res.end();
                    });
                }
            });
            break;
        default: return true;
    }
}