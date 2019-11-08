const fs = require('fs')


fs.readFile(process.argv[2], 'utf8', function doneReading(err, contents) {
  if (err) {
    return console.log(err);
  }

  const newLines = contents.split('\n').length - 1;
  console.log(newLines);
})
