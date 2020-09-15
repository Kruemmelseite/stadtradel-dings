var elements = {};

function shorten(element) {
    if (element.innerHTML.length < 100) return
    elements[element.id] = element.innerHTML;
    element.innerHTML = element.innerHTML.substr(0, 100)+"<p onclick='open_id(\"" + element.id + "\")'  style='color: blue;'>more</p>";
}
 
function shorten_id(id) {
    let element = document.getElementById(id);
    if (element.innerHTML.length < 100) return
    element.innerHTML = element.innerHTML.substr(0, 100)+"<p onclick='open_id(\"" + element.id + "\")'  style='color: blue;'>more</p>";
}
 
function open_id(id) {   
    let element = document.getElementById(id);
    element.innerHTML = elements[id] + "<p onclick='shorten_id(\""+id+"\")' style='color: blue;'>close</p>" ;
}

 
for (let element of document.getElementsByClassName('content_block')) {
    shorten(element);
}
