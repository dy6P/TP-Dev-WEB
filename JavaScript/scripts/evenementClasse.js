window.onload = init;

const chaineJSON =
    '[{"nom" : "Class40", "logo" : "Class40.jpg", "voiliers" : "[{"nom" : "LES INVINCIBLES", "annee" : "2024"}, {"nom" : "SEAFRIGO - SOGESTRAN", "annee" : "2023"}]"},' +
    '{"nom" : "IMOCA", "logo" : "Imoca.jpg", "voiliers" : "[{"nom" : "CHARAL", "annee" : "2022"}, {"nom" : "ALLAGRANDE MAPEI", "annee" : "2023"}]"},' +
    '{"nom" : "Ocean Fifty", "logo" : "OceanFifty.png", "voiliers" : "[{"nom" : "WEWISE", "annee" : "2019"}, {"nom" : "SOLIDAIRES EN PELOTON", "annee" : "2020"}]"},' +
    '{"nom" : "Ultim", "logo" : "Ultim.jpg", "voiliers" : "[{"nom" : "SVR - LAZARTIGUE", "annee" : "2021"}, {"nom" : "SODEBO ULTIM 3", "annee" : "2019"}]"}]';
let classesVoiliers = JSON.parse(chaineJSON);

function init() {
    let divLogo = document.getElementById("logos");
    for (let i = 0; i < classesVoiliers.length; i ++) {
        let logo = document.createElement("img");
        logo.src = "photos/logos/" + classesVoiliers[i].logo;
        logo.alt = classesVoiliers[i].nom;
        logo.id = i;
        logo.height = 200;
        logo.width = 200;
        logo.onmouseover = over;
        divLogo.appendChild(logo);
    }
}


function over() {
    let divNomDeClasse = document.getElementById("nomDeClasse");
    while (divNomDeClasse.firstChild) {
        divNomDeClasse.removeChild(divNomDeClasse.firstChild);
    }
    let indice = this.id;
    let nomClasse = document.createTextNode(classesVoiliers[indice].nom);
    divNomDeClasse.appendChild(nomClasse);
}