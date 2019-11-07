const mymodule = require('./mymodule.js')
const file = process.argv[2];
const ext = process.argv[3];


mymodule(file, ext, function done (err, list)
{
    if (err)
        {
            return console.log(err)
        }
     list.forEach(function done(list)
                  {
                  console.log(list)
                    })
    })
