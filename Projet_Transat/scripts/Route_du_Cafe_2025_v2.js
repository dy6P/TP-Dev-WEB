window.onload = init;

function init() {
    let request = new XMLHttpRequest();
    request.open("GET", "XML/Route_du_Cafe_2025.xml");
    request.send();
    request.onreadystatechange = function () {
        let logos = ["Class40.jpg", "Imoca.jpg", "Oceanfifty.png", "Ultim.jpg"]
        traitementReponse(request, logos);
    }
}

function traitementReponse(request, logos) {
    //console.log(request.readyState + " " + request.status);
    if (request.readyState === 4 && request.status === 200) {
        let classesVoiliers = request.responseXML.getElementsByTagName("classe");
        let divLogo = document.getElementById("logos");
        for (let i = 0; i < classesVoiliers.length; i ++) {
            let elementLogo = document.createElement("img");
            elementLogo.src = "photos/logos/" + logos[i];
            elementLogo.alt = classesVoiliers[i].getAttribute("nom");
            elementLogo.id = i;
            elementLogo.height = 200;
            elementLogo.width = 200;
            elementLogo.onmouseover = function() {
                over(classesVoiliers[i]);
            };
            divLogo.appendChild(elementLogo);
        }
    }
}

function over(classeVoiliers) {
    let divNomDeClasse = document.getElementById("nomDeClasse");
    let divVoiliers = document.getElementById("voiliers");
    while (divNomDeClasse.firstChild) {
        divNomDeClasse.removeChild(divNomDeClasse.firstChild);
    }
    while (divVoiliers.firstChild) {
        divVoiliers.removeChild(divVoiliers.firstChild);
    }
    let nomClasse = document.createTextNode(classeVoiliers.getAttribute("nom"));
    divNomDeClasse.appendChild(document.createTextNode("NOM DE LA CLASSE = "))
    divNomDeClasse.appendChild(nomClasse);
    divNomDeClasse.appendChild(document.createElement("br"));
    divNomDeClasse.appendChild(document.createElement("br"));
    let voiliers = classeVoiliers.getElementsByTagName("voilier");
    divVoiliers.appendChild(document.createElement("table"))
    for (let i = 0; i < voiliers.length; i ++) {
        divVoiliers.appendChild(document.createElement("tr"));
        let nomsVoiliers = voiliers.getElementsByTagName("nom");
        let datesVoiliers = voiliers.getAttribute("date_construction");
        for (let i = 0; i < nomsVoiliers.length; i ++) {
            divVoiliers.appendChild(document.createElement("td"));
            divVoiliers.appendChild(document.createTextNode(nomsVoiliers[i]));
            divVoiliers.appendChild(document.createElement("td"));
            divVoiliers.appendChild(document.createTextNode(datesVoiliers[i]));
        }
    }
}