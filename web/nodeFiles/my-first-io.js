// count number of new lines in a file

const fs = require('fs');

//
//this will returna buffer object containing the whole file
var contents = fs.readFileSync(process.argv[2])

// you can also add -1 at the end of this line instead of the console.log location
const newLine = contents.toString().split('\n').length;

console.log(newLine - 1);

// note you can avoid the .toString() by passing 'utf8' as the
    // second argument to readFileSync, then you'll get a String!
    //
    // fs.readFileSync(process.argv[2], 'utf8').split('\n').length - 1
