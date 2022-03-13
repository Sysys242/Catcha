<?php
$host = "localhost";
$user ="root";
$dbname = "catcha";
$pass = "";

function random_strings($length_of_string)
{
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result),
                       0, $length_of_string);
}

try
{
	$db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $pass);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$sqlQuery = 'INSERT INTO captchakey(capkey, valid) VALUES (:capkey, :valid)';

$capkey = random_strings(70);

$insertRecipe = $db->prepare($sqlQuery);
$insertRecipe->execute([
    'capkey' => $capkey,
    'valid' => 'false',
]);

echo $capkey;

?>