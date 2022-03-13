<?php
error_reporting(E_ERROR | E_PARSE);
$host = "localhost";
$user ="root";
$dbname = "catcha";
$pass = "";

try
{
	$db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $pass);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$captchakey = htmlspecialchars($_GET["capkey"]);

$sqlQuery = 'SELECT * FROM captchakey WHERE capkey=:capkey';
$recipesStatement = $db->prepare($sqlQuery);
$recipesStatement->execute([
    'capkey' => $captchakey
]);
$recipes = $recipesStatement->fetchAll();

foreach ($recipes as $recipe) {
    if($recipe['valid'] == "true") {
        echo "true";
    }else {
        echo "false";
    }
}


?>