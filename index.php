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
        echo "<script>document.location='./error.php?reason=alval'</script>";
    }
}

function getcat() {
    $r = random_int(1, 2);
    $int = ($r == 1) ? "true" : "false";
    return $int;
} 

function encrypt($plaintext, $password) {
    $method = "AES-256-CBC";
    $key = hash('sha256', $password, true);
    $iv = openssl_random_pseudo_bytes(16);

    $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
    $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);

    return $iv . $hash . $ciphertext;
}

function showimage($dir = 'images')
{
    $files = glob($dir . '/*.*');
    $file = array_rand($files);
    return $files[$file];
}

function showbadimage($dir = 'badimages')
{
    $files = glob($dir . '/*.*');
    $file = array_rand($files);
    return $files[$file];
}

$i = 1;
$fpath = "";

for (; ; ) {
    if ($i > 9) {
        break;
    }
    $re = getcat();
    if ($re == "true") {
        echo '<img onclick=\'i1("true", "' . $i .'")\' src="' . showimage() .'"/>';
        $fpath .= "true";
        echo ' ';
    }else {
        echo '<img onclick=\'i1("false", "' . $i . '")\' src="' . showbadimage() .'"/>';
        $fpath .= "false";
        echo ' ';
    }
    if ($i/ 3 == 1 || $i/2 == 3 || $i/3 == 3) {
        echo '<br>';
    }
    $i++;
}

$ffpath = md5($fpath);

echo '
<link rel="stylesheet" href="style.css">
<img class="img1" onclick=\'i1("false", "1")\' id="1img" src="./check.png"/>
<img class="img2" onclick=\'i1("false", "2")\' id="2img" src="./check.png"/>
<img class="img3" onclick=\'i1("false", "3")\' id="3img" src="./check.png"/>
<img class="img4" onclick=\'i1("false", "4")\' id="4img" src="./check.png"/>
<img class="img5" onclick=\'i1("false", "5")\' id="5img" src="./check.png"/>
<img class="img6" onclick=\'i1("false", "6")\' id="6img" src="./check.png"/>
<img class="img7" onclick=\'i1("false", "7")\' id="7img" src="./check.png"/>
<img class="img8" onclick=\'i1("false", "8")\' id="8img" src="./check.png"/>
<img class="img9" onclick=\'i1("false", "9")\' id="9img" src="./check.png"/>
<form action="" method="post">
    <input type = "Text" value ="123456" id = "c8f748d48ff" name="veveverif">
    <input type="submit" value="Verify" onclick=\'ver("' . $ffpath . '")\' name="verif">
</form>
';


$solvedval = $_POST['veveverif'];
if($solvedval == "verified") {
    $sqlQuery = 'UPDATE captchakey SET valid = :valid WHERE capkey = :capkey';
    $insertRecipe = $db->prepare($sqlQuery);
    $insertRecipe->execute([
        'valid' => 'true',
        'capkey' => $captchakey,
    ]);
    echo "<script>document.body.style.display = \"none\";alert('Captcha Solved')</script>";
    echo "";
}
?>

<head>
    <meta property="og:title" content="CatCha On Top">
    <meta id="embed-desc" property="og:description" content="The best captcha services">
</head>

<script type="text/javascript" src="./libs/libs01.js"></script>
<script type="text/javascript" src="./libs/libs02-deobf.js"></script>