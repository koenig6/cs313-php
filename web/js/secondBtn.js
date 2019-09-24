var div = document.getElementsByClassName("first");
div.children[1].onclick = function(){
   div.style.backgroundColor = div.children[0].value;
};
