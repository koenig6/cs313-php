function addItem(){
    var ul = document.getElementById("myList");
    var newItem = document.getElementById("lname"); //get text from box
    var newItem2 = document.getElementById("fname"); //get text from box
    var li = document.createElement("li"); // create li
    li.setAttribute('id', lname.value + ", " + fname.value);
    li.appendChild(document.createTextNode(lname.value + ", " + fname.value)); // add to list
    var input = document.createElement("input");
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'actors[]');
    input.setAttribute('value', lname.value + ", " + fname.value);
    li.appendChild(input);
    ul.appendChild(li); // add to list
}

function removeItem(){
    var ul = document.getElementById("myList");
    var lname = document.getElementById("lname");
    var li = document.getElementById(lname.value + ", " + fname.value);
    ul.removeChild(li);
}


