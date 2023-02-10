<?php
require_once('../inc/fonction.php');
require_once('../inc/connect.php');

$maintenance = maintenance();
if($maintenance == 1){
    header ('location: maintenance.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>GameBox</title>
    <link href="../css/style_connexion.css" rel="stylesheet">
    <link href="../header_footer/navbar.html" rel="stylesheet">
    <link href="../header_footer/navbar_footer.css" rel="stylesheet">
</head>

<body>

    <div class="contenair">
        <form action="connexion.php" method="post">
            Votre email : <input class="form-control" type="text" name="email"><br />
            Votre mot de passe : <input class="form-control" type="password" name="pass"><br />
            <input class="btn btn-primary" type="submit" value="Connexion">
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <?php include('../header_footer/navbar.html');?>

</body>

</html>