var http = require('http'); // Import Node.js core module

var server = http.createServer(function onRequest(req, res) {   //create web server
    if (req.url == '/home') { //check the URL of the current request

        // set response header
        res.writeHead(200, { 'Content-Type': 'text/html' });

        // set response content
        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.write('<html><h1>Welcome to the Home Page!</h1></html>');
        res.end();

    }
    else if (req.url == "/getData")
    {

        res.writeHead(200, { 'Content-Type': 'application/json' });
        res.write(JSON.stringify({"name":"Jody","class":"CS 313"}));
        res.end();

    }
    else
        res.writeHead(400, { 'Content-Type': 'text/html' });
        res.write('404 - Page Not Found');
        res.end();
});

server.listen(5000); //6 - listen for any incoming requests

console.log('Node.js web server at port 5000 is running..')
