<?php 
require_once('../inc/connect.php');
require_once('../inc/fonction.php');
$maintenance = maintenance();
    if($maintenance == 1){
        header ('location: maintenance.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>