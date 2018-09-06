// var http = require('http');
// http.createServer(function(req,res){
//     res.writeHead(200,{'Content-Type':'text-plain'});
//     res.end('Hello World\n');
// }).listen(1337,"127.0.0.1");
// console.log('Server running at 127.0.0.1:1337');

const urlLibrary = require('url')

const pathLibrary = require('path')

const fileLibrary = require ('fs')

const webserverLibrary= require('http');

const hostname = 'localhost';

const port = '3000';



const mimeTypes = {

"html": "text/html",

"jpeg": "image/jpeg",

"jpg" : "image/jpg",

"png" : "image/png",

"js" : "text/javascript",

"css" : "text/css"

} 

const server = webserverLibrary.createServer((request,result) => {



var url = urlLibrary.parse(request.url).pathname;

var fileName = pathLibrary.join(process.cwd(),unescape(url));

console.log('Loading' + url);

var status;

    try {

        status = fileLibrary.lstatSync(fileName)

    } catch (e){

        result.writeHead(404,{'Content-type': 'text/plain'});

        result.write('404 Page not Found \n');

        result.end();

        return;

    }
    if(status.isFile()){
        var mimeType = mimeType[pathLibrary.extname(fileName).split(".").reverse()[0]];
        result.writeHead(200,{'Content-type' : mimeType});
        var fileStream = fileLibrary.createReadStream(fileStream);
        fileStream.pipe(result);
    }

}) 

server.listen(port,hostname,() => { 

console.log('Server running okay at http://'+ hostname + ':'+ port );



})
