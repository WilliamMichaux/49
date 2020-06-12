<!-- Ici le joueur est dans une partie. Il s'est identifié.
$_SESSION['name'] existe avec le nom qu'il a fourni;
--> 
<div id="wrapper">
    <h1>49 le jeu</h1>
    <p>Bienvenuuuuu dans la partie <span id="name"><?php echo $_SESSION["name"]?></span></p>
    <p>Maintenant il faut attendre les autres..</p>
    <p id="otherPlayer">
        <ul id="otherPlayerList"></ul>
        <span id="granularite"></span>
    </p>

    <script src="js/getPlayers.js"></script>
</div>