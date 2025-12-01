window.onload = init;

function init() {
    let request = new XMLHttpRequest();
    request.open("GET", "JSON/Route_du_Cafe_2025.json");
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
    while (divNomDeClasse.firstChild) {
        divNomDeClasse.removeChild(divNomDeClasse.firstChild);
    }
    let nomClasse = document.createTextNode(classesVoiliers[indice].nom);
    divNomDeClasse.appendChild(nomClasse);
}