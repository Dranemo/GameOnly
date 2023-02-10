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
    <?php
            require_once('../inc/fonction.php');
            require_once('../inc/connect.php');

            session_start();

            $maintenance = maintenance();
            if($maintenance == 1){
                header ('location: maintenance.php');
            }

            $mentionLegales = afficherMentionLegale();
        ?>
    <?php foreach ($mentionLegales as $key) : ?>
    <div class="mentionDiv">
        <h1>Mentions Légales</h1>
        <h3>Editeur du Site : </h3>
        <p><?php echo "$key->editeur_du_site"; ?></p>
        <p>Responsable éditorial : <?php echo "$key->responsable_editorial"; ?></p>
        <p>Téléphone : <?php echo "$key->telephone"; ?></p>
        <p>Email : <?php echo "$key->email"; ?></p>

        <h3>Hébergement : </h3>
        <p>Hébergeur : <?php echo "$key->hebergeur"; ?></p>

        <h3>Développement : </h3>
        <p><?php echo "$key->developpement"; ?></p>

        <h3>Conditions d'Utilisation : </h3>
        <p><?php echo "$key->condition_utilisation"; ?></p>
        <p><span style="font-weight: 600;">Cookies : </span><?php echo "$key->cookie"; ?></p>
    </div>

    <?php endforeach; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <?php include('../header_footer/navbar.html');?>
</body>

</html>