<?php
    require_once('../inc/fonction.php');
    require_once('../inc/connect.php');

    session_start();
    if (isset($_SESSION['admin'])) {
        echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['nom']."";
        echo '<br><a href="./deconnexion.php">Deconnexion</a></p>';
    }else{
        header ('location: identification.php');
    }

    $idUtilisateur = $_GET['id']; 
    $nomUtilisateur = $_GET['nom'];

    $utilisateur = afficherUtilisateursParId($idUtilisateur);

    if($_POST){
        if(isset($_POST['envoyer'])){
            modiferUtilisateur($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mot_de_passe'],$_POST['commande'],$_POST['admin']);
            header('location:admin.php?'); 
            exit();
        }
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
    <link href="../header_footer/navbar.html" rel="stylesheet">
    <link href="../header_footer/navbar_footer.css" rel="stylesheet">
</head>

<body>
    <a href="../pages/admin.php">page admin</a><br>

    <main role="main" class="flex-shrink-0">

        <div class="container">
            <?php echo "<h1>Les donnée de $nomUtilisateur :</h1>"?>

            <?php foreach ($utilisateur as $key) : ?>
            <div class="form-style">
                <form method="post" class="formulaire">
                    <legend>Modifier données utilisateur</legend>
                    <fieldset>
                        <input type="hidden" name="id" value=<?php echo "$key->id_user"?>>
                        <label for="field1"><span>Nom <span class="required">
                                    <input class="form-control" type="text" name="nom"
                                        value=<?php echo "$key->nom_user"?>>
                        </label>
                    </fieldset>
                    <fieldset>
                        <label for="filed2"><span>Prenom <span class="required">
                                    <input class="form-control" type="text" name="prenom"
                                        value=<?php echo "$key->prenom_user"?>>
                        </label>
                    </fieldset>
                    <fieldset>
                        <label for="filed3"><span>Email <span class="required">
                                    <input class="form-control" type="text" name="email"
                                        value=<?php echo "$key->email_user"?>>
                        </label>
                    </fieldset>
                    <fieldset>
                        <label for="filed4"><span>Mot de passe <span class="required">
                                    <input class="form-control" type="text" name="mot_de_passe"
                                        value=<?php echo "$key->mot_de_passe_user"?>>
                        </label>
                    </fieldset>
                    <fieldset>
                        <label>
                            <input class="form-control" type="hidden" name="commande"
                                value=<?php echo "$key->commandes_passees"?>>
                        </label>
                    </fieldset>
                    <fieldset>
                        <input type="hidden" name="admin" value=<?php echo "$key->admin"?>>
                    </fieldset>
                    <fieldset>
                        <label><span> </span>
                            <input class="btn btn-success" type="submit" name="envoyer" value="Envoyer" />
                        </label>

                        <!-- rénitialise les données marqué dans le formulaire -->
                        <label><span> </span>
                            <input class="btn btn-success" type="reset" name="reset" placeholder="Reset">
                        </label>
                    </fieldset>
                </form>
            </div>
            <?php endforeach; ?>
        </div>

    </main>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="../script.js"></script>
    <?php include('../header_footer/navbar.html');?>

</body>

</html>