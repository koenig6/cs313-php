function addItem(){
    var ul = document.getElementById("myList");
    var newItem = document.getElementsByName("lname"); //get text from box
    var li = document.createElement("li"); // create li
    li.setAttribute('name',lname.value); //connect li and word from text box
    li.appendChild(document.createTextNode(lname.value)); // add to list
    ul.appendChild(li); // add to list
}

function removeItem(){
    var ul = document.getElementById("myList");
    var item = document.getElementById("item");
    var li = document.getElementById(item.value);
    ul.removeChild(li);
}