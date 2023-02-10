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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Document</title>
    <link rel="stylesheet" href="../css/style_inscription.css">
    <link href="../header_footer/navbar.html" rel="stylesheet">
    <link href="../header_footer/navbar_footer.css" rel="stylesheet">
</head>

<body>
    <div class="form-style">
        <form method="post" class="formulaire">
            <fieldset>
                <legend>Formulaire Inscription</legend>
                <label for="field1"><span>Nom</span>
                    <input type="text" name="nom" required>
                </label>
                <label for="field2"><span>Prenom</span>
                    <input type="text" name="prenom" required>
                </label>
                <label for="field3"><span>Email</span>
                    <input type="mail" name="email" required>
                </label>
                <label for="field4"><span>Mot de passe</span>
                    <input type="password" name="password">
                </label>
                <label for="field5"><span>Newsletter</span>
                    <input type="checkbox" name="checkbox" value="1" class="checkbox">
                </label>

                <label>
                    <input class="input" type="submit" name="envoyer" value="Envoyer" />
                </label>

                <label>
                    <input class="reset" type="reset" name="reset" placeholder="Reset">
                </label>
                <label>
                    <p>Vous avez deja un compte ? <a href="identification.php">Connectez-vous ici</a></p>
                </label>
            </fieldset>
        </form>
    </div>

    <?php
            if($_POST){
            
                extract($_POST); 

                $statement = $pdo->prepare("INSERT INTO user(nom_user, prenom_user, email_user, mot_de_passe_user)
                    VALUES(:nom_user,:prenom_user,:email_user,:mot_de_passe_user)");

                $statement->bindParam(':nom_user', $nom, PDO::PARAM_STR);
                $statement->bindParam(':prenom_user', $prenom, PDO::PARAM_STR);
                $statement->bindParam(':email_user', $email, PDO::PARAM_STR);
                $statement->bindParam(':mot_de_passe_user', $password, PDO::PARAM_STR);

                

                $statement->execute(); 
            }
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <?php include('../header_footer/navbar.html');?>

</body>

</html>