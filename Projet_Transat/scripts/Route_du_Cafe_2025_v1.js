window.onload = init;

function init() {
    let request = new XMLHttpRequest();
    request.open("GET", "JSON/Route_du_Cafe_2025.json");
    //request.open("GET", "XML/Route_du_Cafe_2025.xml");
    request.send();
    request.onreadystatechange = function () {
        traitementReponse(request);
    }
}

function traitementReponse(request) {
    console.log(request.readyState + " " + request.status);
    if (request.readyState === 4 && request.status === 200) {
        let classesVoiliers = JSON.parse(request.responseText).classes;
        let divLogo = document.getElementById("logos");
        for (let i = 0; i < classesVoiliers.length; i ++) {
            let elementLogo = document.createElement("img");
            elementLogo.src = "photos/logos/" + classesVoiliers[i].logo;
            elementLogo.alt = classesVoiliers[i].nom;
            elementLogo.id = i;
            elementLogo.height = 200;
            elementLogo.width = 200;
            elementLogo.onmouseover = function() {
                over(classesVoiliers, i);
            };
            divLogo.appendChild(elementLogo);
        }
    }
}

function over(classesVoiliers, indice) {
    let divNomDeClasse = document.getElementById("nomDeClasse");
    let divVoiliers = document.getElementById("voiliers");
    while (divNomDeClasse.firstChild) {
        divNomDeClasse.removeChild(divNomDeClasse.firstChild);
    }
    while (divVoiliers.firstChild) {
        divVoiliers.removeChild(divVoiliers.firstChild);
    }
    let nomClasse = document.createTextNode(classesVoiliers[indice].nom);
    divNomDeClasse.appendChild(document.createTextNode("NOM DE LA CLASSE = "))
    divNomDeClasse.appendChild(nomClasse);
    divNomDeClasse.appendChild(document.createElement("br"));
    divNomDeClasse.appendChild(document.createElement("br"));
    voiliers = classesVoiliers[indice].voiliers;
    divVoiliers.appendChild(document.createTextNode("LISTE DES VOILIERS = "))
    for (let i = 0; i < voiliers.length; i ++) {
        let voilier = document.createTextNode(voiliers[i].nom);
        divVoiliers.appendChild(voilier);
        if (i+1 < voiliers.length) {
            divVoiliers.appendChild(document.createTextNode(", "));
        }
    }
}