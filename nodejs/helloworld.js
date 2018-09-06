// var webserver = require('http');
// webserver.createServer(function (req,res){
//     res.writeHead(200, {'Content-Type': 'text/plain'});
//     res.end('Hello Monday\n');
// }).listen(1337, "127.0.0.1");
// console.log('server running at 127.0.0.1:1337/');

const urlLibrary = require('url')
const pathLibrary = require('path')
const fileLibrary = require ('fs')
const webserverLibrary= require('http');
const hostname = 'localhost';
const port = '3000';

const mineTypes = {
    "html": "text/html",
    "jpeg": "image/jpeg",
    "jpg" : "image/jpg",
    "png" : "image/png",
    "js"  : "text/javascript",
    "css" : "text/css"
} 
const server =  webserverLibrary.createServer((request,result) => {

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
if (status.isFile()){
     var mineType = mineTypes[pathLibrary.extname(fileName).split(".").reverse()[0]];
   
     result.writeHead(200,{'Content-type' : mineType});
     var fileStream = fileLibrary.createReadStream(fileName);
     fileStream.pipe(result);

}
else if (status.isDirectory()){
    result.writeHead(302,{
        'Location': 'index.html'
    });
    result.end();
}
else {
    result.writeHead(500,{'Content-type' : 'text/plain'});
    result.write('500 Internal Error oh no oh no \n');
    result.end();

}
})  
// const server = webserverLibrary.createServer((request,result) => {
//     result.statusCode = 200;
//     result.setHeader('Content-Type','text/plain');
//     result.end('Running the server in the different way \n');

// })

server.listen(port,hostname,() => { 
    console.log('Server running okay at http://'+ hostname + ':'+ port );

})
