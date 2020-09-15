var elements = {};

function shorten(element) {
    if (element.innerHTML.length < 100) return
    elements.push({key:element.id, value:element.innerHTML});
    element.innerHTML = element.innerHTML.substr(0, 100)+" <p onclick='open("+element.id+")' style='color: blue;'>more</p>";
}

function open(id) {
    let element = document.getElementById(id);
    window.open("about:blank", "Long content", "scrollbars:no").document.write(elements[id]);
}


for (let element of document.getElementsByClassName('content_block')) {
    shorten(element);
}