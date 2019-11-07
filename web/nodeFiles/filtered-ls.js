
const fs = require('fs');
const path = require('path');
const ext = '.' + process.argv[3];


fs.readdir(process.argv[2], function doneReading(err, list) {
  if (err) {
    return console.log(err);
  }
    //foreach puts one per line
 list.forEach(function done(list)
    {
       if(path.extname(list) === ext)
        {
            console.log(list);
        }
    })
})
