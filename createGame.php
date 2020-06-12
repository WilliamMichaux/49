<?php 
session_start();
//Fonction trouvée en ligne
function getToken($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
    }

    return $token;
}
//Fonction trouvée en ligne
function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}


    $_SESSION['code'] = getToken(4);
    $code = $_SESSION['code'];

    $file = fopen("data.json","r");
    $contenu = fread($file, filesize("data.json"));
    fclose($file);
    
    $json = json_decode($contenu, False);    
    
    $json->$code = new stdClass;
    $json->$code->players = array();
    $json->$code->ongoing = False;   
    
    $newJ = json_encode($json);
    $file = fopen("data.json","w");
    fwrite($file, $newJ);
    header('Location: ./');
    
?>