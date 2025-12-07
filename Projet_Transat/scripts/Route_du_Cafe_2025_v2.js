window.onload = init;

function init() {
    let request = new XMLHttpRequest();
    request.open("GET", "/Projet_Transat/XML/Route_du_Cafe_2025.xml");
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
            elementLogo.src = "/Projet_Transat/photos/logos/" + logos[i];
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

    divNomDeClasse.innerHTML = "";
    divVoiliers.innerHTML = "";

    divNomDeClasse.append(classeVoiliers.getAttribute("nom"));
    divNomDeClasse.appendChild(document.createElement("br"));
    divNomDeClasse.appendChild(document.createElement("br"));
    divNomDeClasse.appendChild(document.createElement("br"));


    let voiliers = classeVoiliers.getElementsByTagName("voilier");

    let table = document.createElement("table");
    divVoiliers.appendChild(table);
    let trTitre = document.createElement("tr");
    let thNom = document.createElement("th");
    thNom.textContent = "Nom";
    let thAnnee = document.createElement("th");
    thAnnee.textContent = "Année";
    trTitre.appendChild(thNom);
    trTitre.appendChild(thAnnee);
    table.appendChild(trTitre);
    for (let i = 0; i < voiliers.length; i++) {
        let voilier = voiliers[i];
        let nom = voilier.getElementsByTagName("nom")[0].textContent;
        let date = voilier.getAttribute("date_construction");
        let tr = document.createElement("tr");
        let tdNom = document.createElement("td");
        tdNom.textContent = nom;
        tr.appendChild(tdNom);
        let tdDate = document.createElement("td");
        tdDate.textContent = date;
        tr.appendChild(tdDate);
        table.appendChild(tr);
    }
}
