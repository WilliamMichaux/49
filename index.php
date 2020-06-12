<?php 
    session_start();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>49 Le jeu</title>
    <!--<link rel="stylesheet" type="text/css" href="style/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">-->
</head>
<body>
    <?php 
        if (isset($_SESSION['code']) and !isset($_SESSION['etat'])) {
            require_once("partieCree.php");
            //unset($_SESSION['code']);
            //unset($_SESSION['etat']);
        } elseif (isset($_SESSION['etat']) and $_SESSION['etat'] == "on") {
            echo "blabla";
            unset($_SESSION['code']);
            unset($_SESSION['etat']);
            require_once("lauchedGame.php");
        } else {
            require_once("pasPartie.php");
        }
    ?>
    <div><span id="codeCoin" class="badge badge-primary"><?php if (isset($_SESSION['code'])){
        echo $_SESSION['code']; 
    } ?></span></div>    
</body>
</html>