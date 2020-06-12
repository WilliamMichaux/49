window.onload = init;
let code;
let partiElt;
let btnCommencer;

function init(){
    partiElt = document.getElementById("listParticipants");
    code = document.getElementById("code").textContent;
    btnCommencer = document.getElementById("commencerPartie");
    console.log(code);
}

setInterval(function(){
    let req = new XMLHttpRequest();
    req.open("GET", "data.json", false);
    req.send();
    let obj = JSON.parse(req.responseText);
    partiElt.textContent = "";
    obj[code]["players"].forEach(player => {
        let liElt = document.createElement("li");
        liElt.textContent = player;
        partiElt.appendChild(liElt);
    });
    if (obj[code]["players"].length >= 3) {
        btnCommencer.hidden = false;
    }
},3000)