window.onload = init;

function init() {
    let requestJSON = new XMLHttpRequest();
    requestJSON.open("GET", "../JSON/Route_du_Cafe_2025.json");
    requestJSON.overrideMimeType("application/json");
    requestJSON.send();

    requestJSON.onreadystatechange = function() {
        if (requestJSON.readyState === 4) {
            let listeAbandons = [];
            if (requestJSON.status === 200 && requestJSON.responseText) {
                let data = JSON.parse(requestJSON.responseText);
                if (Array.isArray(data)) {
                    listeAbandons = data;
                } else {
                    listeAbandons = [data];
                }
            }
            chargerXML(listeAbandons);
        }
    }
}

function chargerXML(listeAbandons) {
    let requestXML = new XMLHttpRequest();
    requestXML.open("GET", "../XML/Route_du_Cafe_2025.xml");
    requestXML.send();
    requestXML.onreadystatechange = function () {
        let logos = ["Class40.jpg", "Imoca.jpg", "Oceanfifty.png", "Ultim.jpg"];
        traitementReponse(requestXML, logos, listeAbandons);
    }
}

function traitementReponse(request, logos, listeAbandons) {
    if (request.readyState === 4 && request.status === 200) {
        let classesVoiliers = request.responseXML.getElementsByTagName("classe");
        let divLogo = document.getElementById("logos");
        for (let i = 0; i < classesVoiliers.length; i ++) {
            let elementLogo = document.createElement("img");
            elementLogo.src = "../photos/logos/" + logos[i];
            elementLogo.alt = classesVoiliers[i].getAttribute("nom");
            elementLogo.id = i;
            elementLogo.height = 200;
            elementLogo.width = 200;
            elementLogo.onmouseover = function() {
                over(classesVoiliers[i], listeAbandons);
            };
            divLogo.appendChild(elementLogo);
        }
    }
}

function over(classeVoiliers, listeAbandons){
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
    let thVoilier = document.createElement("th");
    thVoilier.textContent = "Voilier";
    let thAnnee = document.createElement("th");
    thAnnee.textContent = "Année";
    let thSkippers = document.createElement("th");
    thSkippers.textContent = "Skippers";
    let thAbandon = document.createElement("th");
    thAbandon.textContent = "Abandon";
    trTitre.appendChild(thVoilier);
    trTitre.appendChild(thAnnee);
    trTitre.appendChild(thSkippers);
    trTitre.appendChild(thAbandon);
    table.appendChild(trTitre);

    for(let i=0; i<voiliers.length; i++){
        let voilier = voiliers[i];
        let nomVoilier = voilier.getElementsByTagName("nom")[0].textContent.trim();
        let anneeVoilier = voilier.getAttribute("date_construction");

        let tr = document.createElement("tr");

        let tdNom = document.createElement("td");
        tdNom.textContent = nomVoilier;
        tr.appendChild(tdNom);

        let tdDate = document.createElement("td");
        tdDate.textContent = anneeVoilier;
        tr.appendChild(tdDate);

        let tdSkippers = document.createElement("td");
        let skippersNodes = voilier.getElementsByTagName("skipper");
        let skippersArray = [];

        for(let j=0; j<skippersNodes.length; j++){
            let skipperNom = skippersNodes[j].textContent;
            skippersArray.push(skipperNom);
            if(j > 0) tdSkippers.textContent += ", ";
            tdSkippers.textContent += skipperNom;
        }
        tr.appendChild(tdSkippers);

        let tdAbandon = document.createElement("td");
        let checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.name = "abandon";

        for(let k=0; k < listeAbandons.length; k ++) {
            if(listeAbandons[k].nom === nomVoilier && listeAbandons[k].abandon === true) {
                checkbox.checked = true;
                break;
            }
        }

        checkbox.onchange = function() {
            let found = false;
            for(let k = 0; k < listeAbandons.length; k++) {
                if(listeAbandons[k].nom === nomVoilier) {
                    listeAbandons[k].abandon = this.checked;
                    found = true;
                    break;
                }
            }

            if(!found) {
                let voilierJS = {
                    nom : nomVoilier,
                    skippers : skippersArray,
                    abandon : this.checked
                }
                listeAbandons.push(voilierJS);
            }

            enregistrerAbandons(listeAbandons)
        }
        tdAbandon.appendChild(checkbox);
        tr.appendChild(tdAbandon);
        table.appendChild(tr);
    }
}

function enregistrerAbandons(listeAbandons) {
    let voilierJSON = JSON.stringify(listeAbandons);
    let request = new XMLHttpRequest();
    request.open("POST", "../PHP/enregistrementAbandons.php");
    request.setRequestHeader("Content-Type", "application/json");
    request.send(voilierJSON);
    request.onload = function() {
        console.log(request.responseText);
    }
}