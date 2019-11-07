var http= require('http');

function sayHello(request, responce)
{
    console.log('Recieved a request for : ' + request.url);

}

var server = http.createServer(sayHello);
server.listen(5000);

console.log('The server is now listening on port 5000....');
