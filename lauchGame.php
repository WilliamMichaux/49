<?php
    session_start();

    $file = fopen("data.json","r");
    $contenu = fread($file, filesize("data.json"));
    fclose($file);

    $json = json_decode($contenu, False);
    $code = $_SESSION['code'];

    echo $code;
    $json->$code->ongoing = True;
    $newJ = json_encode($json);
    $file = fopen("data.json","w");
    fwrite($file, $newJ);
    $_SESSION["etat"] = "on";
    header('Location: ./');
?>