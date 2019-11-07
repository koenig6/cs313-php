// add numbers that are entered via the command line interface


var total = 0;

for (var i = 2; i < process.argv.length; i++)
    {
                //numbers() because process.argv is a string and I need nubmers to add
                total += Number(process.argv[i]);
    }

console.log(total);
