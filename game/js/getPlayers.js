window.onload = init;
let name;
let code;
let partiElt;
let btnCommencer;

function init(){
    name = document.getElementById("name").textContent;
    code = document.getElementById("code").textContent;
    console.log(code);
}

setInterval(function(){
    
    let players = getplayers(code);
    let IsOngoing = getOngoing(code);
    let otherPlayerLi = document.getElementById("otherPlayerList");
    let otherPlayer = document.getElementById("granularite");
    otherPlayer.textContent = ""
    if (players.length == 1) {
        otherPlayer.textContent = "Tu es tout seul dans la game.. CHEH";
    } else {
        otherPlayerLi.innerHTML = "";
        players.forEach(player => {
            if (player != name){
                let liElt = document.createElement("li");
                liElt.textContent = player;

                otherPlayerLi.appendChild(liElt);
            }
        });
        if (players.length == 2){
            otherPlayer.textContent += " est là !";
        }
        if (players.length == 3){
            otherPlayer.textContent += " sont là !";
        }

        if (IsOngoing){
            document.location.href = "./launchGame.php";
        }
    }
},3000)

function getOngoing(code){
    let req = new XMLHttpRequest();
    req.open("GET", "../data.json", false);
    req.send();
    
    let obj = JSON.parse(req.responseText);

    return obj[code]["ongoing"];
}

function getplayers(code){
    let req = new XMLHttpRequest();
    req.open("GET", "../data.json", false);
    req.send();
    
    let obj = JSON.parse(req.responseText);

    return obj[code]["players"];
}