function addItem(){
    var ul = document.getElementById("myList");
    var newItem = document.getElementById("lname"); //get text from box
    var newItem2 = document.getElementById("fname"); //get text from box
    var li = document.createElement("li"); // create li
    li.setAttribute('id',lname.value); //gives the li and id
    li.appendChild(document.createTextNode(lname.value + ", " + fname.value)); // add to list
    ul.appendChild(li); // add to list
}

function removeItem(){
    var ul = document.getElementById("myList");
    var lname = document.getElementById("lname");
    var li = document.getElementById(lname.value);
    ul.removeChild(li);
}


