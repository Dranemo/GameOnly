<?php 
    require_once('../inc/connect.php');
    require_once('../inc/fonction.php');
    session_start();
    if (isset($_SESSION['nom'])) {
        echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['nom']."";
        echo '<br><a href="./deconnexion.php">Deconnexion</a></p>';
    }else{
        header ('location: identification.php');
    }
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
    <title>GameBox</title>
    <link rel="stylesheet" href="../css/style_contact.css">
    <link href="../header_footer/navbar.html" rel="stylesheet">
    <link href="../header_footer/navbar_footer.css" rel="stylesheet">

</head>

<body class="backgroundphp">

    <div class="form-style">
        <form method="post" class="formulaire">
            <fieldset>
                <legend>Contact</legend>
                <label for="field1"><span>Mail <span class="required">*</span></span>
                    <input class="input" type="mail" name="mail" placeholder="Mail" required>
                </label>

                <label for="filed2"><span>Objet <span class="required">*</span></span>
                    <input class="Objet" type="text" name="objet" placeholder="Objet" required>
                </label>

            </fieldset>

            <fieldset>
                <label for="field3"><span>Message <span class="required">*</span></span>
                    <textarea class="textarea" name="message" placeholder="Message" max-length="200"
                        required></textarea>
                </label>

                <label><span> </span>
                    <input class="input" type="submit" name="envoyer" value="Envoyer" />
                </label>

                <!-- rénitialise les données marqué dans le formulaire -->
                <label><span> </span>
                    <input class="reset" type="reset" name="reset" placeholder="Reset">
                </label>
            </fieldset>
        </form>
    </div>

    <?php
            if($_POST){
                extract($_POST); 
                // echo '<pre>';  
                // print_r($_POST);
                // echo '</pre>'; 
                
                $statement = $pdo->prepare("INSERT INTO page_contact(email_user, objet, message)
                VALUES(:email_user, :objet, :message)");
                
                
                $statement->bindParam(':email_user', $mail, PDO::PARAM_STR);
                $statement->bindParam(':objet', $objet, PDO::PARAM_STR);
                $statement->bindParam(':message', $message, PDO::PARAM_STR);
                
                $statement->execute(); 
            }
            ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <?php include('../header_footer/navbar.html');?>
</body>

</html>