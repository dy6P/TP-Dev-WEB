window.onload = init;
function init() {
    let img = document.getElementsByTagName("img");
    for (let i = 0; i < img.length; i ++) {
        img[i].onmouseover = over;
        img[i].onmouseout = out;
    }
}

function over() {
    let voiliers = ["INITIATIVES COEUR", "SOLIDAIRES EN PELOTON", "TEAM SNEF - TEAMWORK", "ALLAGRANDE MAPEI"]
    let skipper = this.getAttribute("alt");
    let result = document.getElementById("result");
    result.appendChild(document.createTextNode(skipper + " : " + voiliers[this.getAttribute("id") - 1]));
}

function out() {
    let result = document.getElementById("result");
    while (result.firstChild) {
        result.removeChild(result.firstChild);
    }
}