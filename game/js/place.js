window.onload = init;
let placeElt;
let code;
let players;
let newPlaces = [];

function init(){
    joueurElt = document.getElementById("joueur");
    placeElt = document.getElementById("places");
    code = document.getElementById("code").textContent;
    afficheListe();
        
}

function afficheListe(){
    joueurElt.innerHTML = "";
    players = getplayers(code);
    let place = 1;
    players.forEach(player => {
        console.log(newPlaces.includes(player));
        if (!(newPlaces.includes(player))) {
            let btnElt = document.createElement("button");

            btnElt.id = player;
            btnElt.textContent = player;
            btnElt.onclick = passerelleAddPlayers();
            joueurElt.appendChild(btnElt);
            place++;
        }
    });
    if(players.length == newPlaces.length){
        let btnValider = document.createElement("button");
        let btnEffacer = document.createElement("button");

        btnValider.textContent = "Valider l'ordre";
        btnEffacer.textContent = "Je me suis trompé";

        btnEffacer.onclick = refresh();
        btnValider.onclick = confirm;
        joueurElt.appendChild(btnValider);
        joueurElt.appendChild(btnEffacer);
    }
}

function refresh(){
    return () => document.location.reload(true);
}

function confirm(){
    return updateGame(code, newPlaces);
}

function updateGame(code, newList){
    let req = new XMLHttpRequest();
    req.open("GET", "../data.json", false);
    req.send();
    console.log(code);
    let obj = JSON.parse(req.responseText);

    obj[code].players = newList;
    console.log(obj);

}

function getplayers(code){
    let req = new XMLHttpRequest();
    req.open("GET", "../data.json", false);
    req.send();
    console.log(code);
    let obj = JSON.parse(req.responseText);

    return obj[code]["players"];
}

function passerelleAddPlayers(){
    return function addPlayers(ev){
        let cible = ev.target.innerHTML;
        let liElt = document.createElement("li");
        liElt.textContent = cible;

        placeElt.appendChild(liElt);
        newPlaces.push(cible);
        afficheListe();
    }
}


  
