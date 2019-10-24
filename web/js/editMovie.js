function addItem(){
    var ul = document.getElementById("myList");
    var lname = document.getElementById("lname"); //get text from box
    var fname = document.getElementById('fname');
    var li = document.createElement("li"); // create li
    li.setAttribute('id',lname.value); //connect li and word from text box
    li.appendChild(document.createTextNode(item.value)); // add to list
    ul.appendChild(li); // add to list
}

function removeItem(){
    var ul = document.getElementById("myList");
    var item = document.getElementById("item");
    var li = document.getElementById(item.value);
    ul.removeChild(li);
}
