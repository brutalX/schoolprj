var expressLibrary = require('express');
var pathLibrary = require('path');
var bodyParseLibrary = require('body-parser');
var nodeMailerLibrary = require('nodemailer');

var app = expressLibrary();
app.use(bodyParseLibrary.json());
app.use(bodyParseLibrary.urlencoded({extend: false}));
app.use(expressLibrary.static(pathLibrary.join(__dirname ,'public')));
app.use(expressLibrary.static(__dirname));
app.listen(3000);
console.log('server running app.js on port 3000');

app.set(pathLibrary.join(__dirname,'views'));

app.set('view engine','pug');



  
 
app.get('/',(req,res) => {

res.render('index');

// res.send('<h1>Hello we managed to server GET command</h1>')

console.log('Hello we managed to server Get command');

});
app.get('/about', function(req, res){
    res.render('about', { title: 'about' });
});
app.get('/contact', function(req, res){
    res.render('contact', { title: 'contact' });
});
app.post('/contact/send', function(req, res){
    res.render('send', { title: 'sending..' });
});
