<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>GameBox</title>
    <link href="header_footer/navbar.html" rel="stylesheet">
    <link href="header_footer/navbar_footer.css" rel="stylesheet">
</head>

<body>
    <?php
            require_once('../inc/fonction.php');
            require_once('../inc/connect.php');

            session_start();

            session_start();
            if (isset($_SESSION['admin'])) {
                echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['nom']."";
                echo '<br><a href="./deconnexion.php">Deconnexion</a></p>';
            }else{
                header ('location: identification.php');
            }

            $idUtilisateur = $_GET['id']; 
            $nomUtilisateur = $_GET['nom'];

            $commandes = lesCommandeDunUtilisater($idUtilisateur);

            if(isset($_GET['delete']))
            {
                echo 'commande a supprimé ' . $_GET['id'];
            
                    supprimerCommande($_GET['id']);
                    header('location:admin.php?successDeleteCommande=true'); 
                    exit();
            }
            if(isset($_GET['successDelete']))
            {
                echo '<p>commande supprimé</p>'; 
            }
        ?>
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?php echo "<h1>Les commandes de $nomUtilisateur :</h1>"?>
            <table class=" table table-dark">
                <tr>
                    <th>type de payement</th>
                    <th>adresse</th>
                    <th>gamebox</th>
                    <th>total a payer</th>
                    <th>supprimer</th>
                </tr>
                <?php foreach ($commandes as $key) : ?>
                <tr>
                    <th><?php echo "$key->type_payement"; ?></th>
                    <th><?php echo "$key->adresse_livraison"; ?></th>
                    <th><?php echo "$key->gamebox"; ?></th>
                    <th><?php echo "$key->total_payer"; ?></th>
                    <th><a href="?delete=true&id=<?= $key->id_commande?>">supprimer</a></th>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="../script.js"></script>
    <?php include('header_footer/navbar.html');?>
</body>

</html>