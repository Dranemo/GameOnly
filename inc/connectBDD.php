<?php 
// variable importantes
$servname = 'localhost';
$user = 'root';
$pass = 'root';
$dbname = 'gamebox';
try{
    $pdo = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass, array(
    PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC, 
    PDO::ERRMODE_WARNING
));
}catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
