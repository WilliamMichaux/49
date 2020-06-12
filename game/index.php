<?php
    session_start();
    //vérification de la validitié du code
    if (isset($_POST['code']) and !isset($_SESSION['code'])) {
        //ouverture fichier et récupération des données
        $file = fopen("../data.json",'r');
        $contenu = fread($file,filesize("../data.json"));
        fclose($file);
        $obj = json_decode($contenu, True);
        foreach ($obj as $code=>$list){
            if (strtoupper($_POST['code']) == $code){
                $_SESSION['code'] = strtoupper($_POST['code']);
            }            
        }
    }
    //Ajoute le nom dans le fichier JSON
    if (isset($_POST['name']) and !isset($_SESSION['name'])) {
        $_SESSION['name'] = $_POST['name'];        
        $json_obj = file_get_contents('../data.json');
        $data = json_decode($json_obj, true);
        $code = $_SESSION['code'];
        $partie = $data[$code];
        if (count($partie["players"]) == 0){
            $_SESSION["first"] = 1;
        }
        array_push($partie["players"],$_POST['name']);
        $data[$code] = $partie;
        $json_object = json_encode($data);
        file_put_contents('../data.json', $json_object);
    }
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Le jeu</title>
    <style>
#div1, #div2, #div3 {
  width: 350px;
  height: 70px;
  padding: 10px;
  border: 1px solid #aaaaaa;
}
</style>
</head>
<body>
    <?php
        if (isset($_SESSION['etat']) and $_SESSION['etat'] != "off"){
            require_once("startedGame.php");
            //unset($_SESSION['etat']);
            //unset($_SESSION['code']);
            //unset($_SESSION['name']);
            //unset($_SESSION['first']);
        } elseif (isset($_SESSION['name'])) {
            require_once("waitingScreen.php");
            
        } elseif (isset($_SESSION['code'])) {
            require_once("nameForm.php");
        } else {
            require_once("outgame.php");
        }
    ?>
    <div id="code"><?php if(isset($_SESSION['code'])){
        echo $_SESSION['code'];
    } ?></div>
</body>
</html>