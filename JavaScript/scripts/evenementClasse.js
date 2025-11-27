window.onload = init;

function init() {
    ajouterLogos();
}

function ajouterLogos() {
    let divLogo = document.getElementById("logos");
    let logos = ["photos/logos/Class40.jpg", "photos/logos/Imoca.jpg", "photos/logos/OceanFifty.png", "photos/logos/Ultim.jpg"];
    for (let i = 0; i < logos.length; i ++) {
        let logo = logos[i];
        logo = document.createElement("img");
        divLogo.appendChild(logo);
    }
}