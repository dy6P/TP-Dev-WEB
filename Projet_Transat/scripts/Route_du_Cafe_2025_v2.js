window.onload = init;

function init() {
    let request = new XMLHttpRequest();
    request.open("GET", "../XML/Route_du_Cafe_2025.xml");
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
            elementLogo.src = "../photos/logos/" + logos[i];
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

function over(classeVoiliers){
    let divNomDeClasse=document.getElementById("nomDeClasse");
    let divVoiliers=document.getElementById("voiliers");
    divNomDeClasse.innerHTML="";
    divVoiliers.innerHTML="";
    divNomDeClasse.append(classeVoiliers.getAttribute("nom"));
    divNomDeClasse.appendChild(document.createElement("br"));
    divNomDeClasse.appendChild(document.createElement("br"));
    divNomDeClasse.appendChild(document.createElement("br"));
    let voiliers=classeVoiliers.getElementsByTagName("voilier");
    let table=document.createElement("table");
    divVoiliers.appendChild(table);
    let trTitre=document.createElement("tr");
    let thVoilier=document.createElement("th");
    thVoilier.textContent="Voilier";
    let thAnnee=document.createElement("th");
    thAnnee.textContent="Année";
    let thSkippers=document.createElement("th");
    thSkippers.textContent="Skippers";
    let thAbandon=document.createElement("th");
    thAbandon.textContent="Abandon";
    trTitre.appendChild(thVoilier);
    trTitre.appendChild(thAnnee);
    trTitre.appendChild(thSkippers);
    trTitre.appendChild(thAbandon);
    table.appendChild(trTitre);
    for(let i=0;i<voiliers.length;i++){
        let voilier=voiliers[i];
        let nomVoilier=voilier.getElementsByTagName("nom")[0].textContent;
        let anneeVoilier=voilier.getAttribute("date_construction");
        let tr=document.createElement("tr");
        let tdNom=document.createElement("td");
        tdNom.textContent=nomVoilier;
        tr.appendChild(tdNom);
        let tdDate=document.createElement("td");
        tdDate.textContent=anneeVoilier;
        tr.appendChild(tdDate);
        let tdSkippers=document.createElement("td");
        let skippers=voilier.getElementsByTagName("skipper");
        for(let j=0;j<skippers.length;j++){
            let skipperNom=skippers[j].textContent;
            if(j>0)tdSkippers.textContent+=", ";
            tdSkippers.textContent+=skipperNom;
        }
        tr.appendChild(tdSkippers);
        let tdAbandon=document.createElement("td");
        let checkbox=document.createElement("input");
        checkbox.type="checkbox";
        checkbox.name="abandon";
        checkbox.onchange = function() {
            voilierJS = {nom : nomVoilier, skippers : skippers}
            enregistrerAbandons(voilierJS)
        }
        tdAbandon.appendChild(checkbox);
        tr.appendChild(tdAbandon);
        table.appendChild(tr);
    }
}

function enregistrerAbandons(voilierJS) {
    let voilierJSON = JSON.stringify(voilierJS);
    let request = new XMLHttpRequest();
    request.open("POST", "../PHP/enregistrementAbandons.php");
    request.setRequestHeader("Content-Type", "application/json");
    request.send(voilierJSON);
    request.onload = function() {
        console.log(request.responseText);
    }
}

