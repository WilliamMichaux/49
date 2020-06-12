<div id="wrapper">
    <h1 class="primary">49 Le jeu</h1>
    <p>En vous rendant sur le site /49/game</p>
    <p>Pour rejoindre il faut rentrer le code suivant : <span id="code"><?php echo $_SESSION['code']?></span></p>
    <div id="participants">
        <ul id="listParticipants"></ul>
    </div>
    <form action="lauchGame.php" method="post">
        <input id="commencerPartie" type="submit" value="COMMENCER LA PARTIE" hidden>
    </form>
    
    <script src="js/app.js"></script>
</div>