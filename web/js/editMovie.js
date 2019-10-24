function addItem(){
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
}
