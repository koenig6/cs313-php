function addItem(){
    var ul = document.getElementById("myList");
    var newItem = document.getElementById("lname"); //get text from box
    var newItem2 = document.getElementById("fname"); //get text from box
    var li = document.createElement("li"); // create li
    li.setAttribute('id',lname.value + 'id',fname.value); //connect li and word from text box
    li.appendChild(document.createTextNode(lname.value + ", " + fname.value)); // add to list
    ul.appendChild(li); // add to list
}

function removeItem(){
    var ul = document.getElementById("myList");
    var item = document.getElementById("lname");
    var li = document.getElementById(lname.value);
    ul.removeChild(li);
}



/*function addItem(){
    var ul = document.getElementById("myList");
    var newItem = document.getElementById("item"); //get text from box
    var li = document.createElement("li"); // create li
    li.setAttribute('id',item.value); //connect li and word from text box
    li.appendChild(document.createTextNode(item.value)); // add to list
    ul.appendChild(li); // add to list
}

function removeItem(){
    var ul = document.getElementById("myList");
    var item = document.getElementById("item");
    var li = document.getElementById(item.value);
    ul.removeChild(li);
}*/
