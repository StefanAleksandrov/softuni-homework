const url = require('url');
const fs = require('fs');
const path = require('path');
const qstring = require('querystring');
const formidable = require('formidable');

const catsData = require("../data/cats.json");
const breedsData = require("../data/breeds.json");

module.exports = (req, res) => {
    const pathname = url.parse(req.url).pathname;
    let formData;
    if(req.method !== "POST") return;

    switch (pathname) {
        case '/cats/add-breed':
            formData = '';

            req.on('data', (data) => {
                formData += data;
            });

            req.on('end', () => {
                let body = qstring.parse(formData);
                
                fs.readFile('./data/breeds.json', (err, data) => {
                    if ( err ) {
                        console.log(err);
    
                        res.writeHead(404, {
                            'Content_Type': 'text/plain'
                        });
                        res.write('404');
                        res.end();

                    } else {
                        let breeds = JSON.parse(data);
                        breeds.push(body.breed);
                        let json = JSON.stringify(breeds);

                        fs.writeFile('./data/breeds.json', json, 'utf-8', (err) => {
                            if ( err ) {
                                console.log(err);
                                return;

                            } else {
                                console.log('The breed was successfully added!');
                                res.writeHead(301, { Location: '/' });
                                res.end();
                            }
                        });
                    }
                });
            });

            break;

        case '/cats/add-cat':
            formData = '';
            let form = new formidable.IncomingForm();

            form.parse( req, (err, fields, files ) => {
                if ( err ) {
                    console.log(err);
                    res.writeHead(400, {
                        "Content-Type": "text/plain"
                    });
                    res.write("Error ", err);
                    res.end();

                } else {
                    let oldPath = files.upload.path;
                    let newPath = './content/images/' + files.upload.name;

                    fs.rename(oldPath, newPath, (err) => {
                        if ( err ) {
                            throw err
                        } else {
                            console.log('File was uploaded successfully!');
                        }
                    });

                    fs.readFile('./data/cats.json', (err, data) => {
                        if ( err ) {
                            console.log(err);
        
                            res.writeHead(404, {
                                'Content_Type': 'text/plain'
                            });
                            res.write('404');
                            res.end();
        
                        } else {
                            let cats = JSON.parse(data);
                            cats.push({id: cats.length, ...fields, image: files.upload.name});
                            let json = JSON.stringify(cats);
        
                            fs.writeFile('./data/cats.json', json, 'utf-8', (err) => {
                                if (err) {
                                    console.log(err);
                                    return;
        
                                } else {
                                    console.log('The cat was successfully added!');
                                    res.writeHead(301, { Location: '/' });
                                    res.end();
                                }
                            });
                        }
                    });
                }
            });

            break;

        default: return true;
    }
}