window.onload = init;
function init() {
    let img = document.getElementsByTagName("img");
    for (let i = 0; i < img.length; i ++) {
        img[i].onmouseover = over;
        img[i].onmouseout = out;
    }
}

function over() {
    let voiliers = {
        "Samantha DAVIES" : { nom: "INITIATIVES COEUR", photo: "photos/INITIATIVES_COEUR.jpg" },
        "Thibaut VAUCHET-CAMUS" : { nom: "SOLIDAIRES EN PELOTON", photo: "photos/SOLIDAIRES_EN_PELOTON.jpg" },
        "Justine METTRAUX" : { nom: "TEAM SNEF - TEAMWORK", photo: "photos/TEAM_SNEF-TEAMWORK.png" },
        "Thomas RUYANT" : { nom: "ALLAGRANDE MAPEI", photo: "photos/ALLAGRANDE_MAPEI.jpg" }
    };
    let skipper = this.getAttribute("alt");
    let result = document.getElementById("result");
    result.appendChild(document.createTextNode("NOM" + " : " + skipper));
    result.appendChild(document.createElement("br"));
    result.appendChild(document.createTextNode("VOILIER" + " : " + voiliers[skipper]["nom"]));
    result.appendChild(document.createElement("br"));
    let img = document.createElement("img");
    img.src = voiliers[skipper]["photo"];
    img.style.height = "200px";
    img.style.width = "180px";
    result.appendChild(img);
}

function out() {
    let result = document.getElementById("result");
    while (result.firstChild) {
        result.removeChild(result.firstChild);
    }
}