const minhaDiv = document.getElementsByTagName("div")[0];

for (var i = 0; i < minhaDiv.children.length; i++) {
    var element = minhaDiv.children[i];
    if (element.innerText.length <= 10) {
        element.style["color"] = "blue";
    }
    else if (element.innerText.length <= 20) {
        element.style["color"] = "green";
    }
    else {
        element.style["color"] = "red";
    }
}
