<?php 
    session_start();
    $_SESSION["etat"] = "pre";
    header('Location: ./');
?>