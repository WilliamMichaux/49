<div id="wrapper">
    <?php 
        if(isset($_SESSION['first'])){
            require_once("ingame/choice.php");
        } else {
            ?> <div>
            <p>La partie va commencer !</p>
            <p>Le premier joueur à s'être inscrit doit encore choisir l'ordre des joueurs</p>
        </div><?php
        }
    ?>
</div>