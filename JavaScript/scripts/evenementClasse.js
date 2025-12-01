window.onload = init;

const chaineJSON =
    '[{"nom" : "Class40", "logo" : "Class40.jpg", "voiliers" : [{"nom" : "LES INVINCIBLES", "annee" : "2024"}, {"nom" : "SEAFRIGO - SOGESTRAN", "annee" : "2023"}]},' +
    '{"nom" : "IMOCA", "logo" : "Imoca.jpg", "voiliers" : [{"nom" : "CHARAL", "annee" : "2022"}, {"nom" : "ALLAGRANDE MAPEI", "annee" : "2023"}]},' +
    '{"nom" : "Ocean Fifty", "logo" : "OceanFifty.png", "voiliers" : [{"nom" : "WEWISE", "annee" : "2019"}, {"nom" : "SOLIDAIRES EN PELOTON", "annee" : "2020"}]},' +
    '{"nom" : "Ultim", "logo" : "Ultim.jpg", "voiliers" : [{"nom" : "SVR - LAZARTIGUE", "annee" : "2021"}, {"nom" : "SODEBO ULTIM 3", "annee" : "2019"}]}]';
let classesVoiliers = JSON.parse(chaineJSON);

function init() {
    let divLogo = document.getElementById("logos");
    for (let i = 0; i < classesVoiliers.length; i ++) {
        let elementLogo = document.createElement("img");
        elementLogo.src = "photos/logos/" + classesVoiliers[i].logo;
        elementLogo.alt = classesVoiliers[i].nom;
        elementLogo.id = i;
        elementLogo.height = 200;
        elementLogo.width = 200;
        elementLogo.onmouseover = over;
        divLogo.appendChild(elementLogo);
    }
}

function over() {
    let divNomDeClasse = document.getElementById("nomDeClasse");
    let divVoiliers = document.getElementById("voiliers");
    while (divNomDeClasse.firstChild) {
        divNomDeClasse.removeChild(divNomDeClasse.firstChild);
    }
    while (divVoiliers.firstChild) {
        divVoiliers.removeChild(divVoiliers.firstChild);
    }
    let indice = this.id;
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