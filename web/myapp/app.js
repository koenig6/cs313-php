const express = require('express')
const app = express()
const port = 3000

app.use(express.static('public'));//this lets express use anything from this file

app.get('/', function(req, res)
        {
        console.log("Received a request for /");
        res.send('This is the root!')
        res.end();
        });

app.get('/home', function(req, res)
        {
        res.write('This is the home page!')
        console.log("Received a request for /home");
        res.end();
        });

app.listen(port, function(){
    console.log(`Example app listening on port ${port}!`)
});
