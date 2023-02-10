<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>GameBox</title>
        <link href="../css/style_admin.css">
        <link href="../header_footer/navbar.html" rel="stylesheet">
        <link href="../header_footer/navbar_footer.css" rel="stylesheet">
    </head>
    <body class="body">
        <?php
            require_once('../inc/fonction.php');
            require_once('../inc/connect.php');

            session_start();

            $utilisateurs = afficherUtilisateurs();
            $question = afficheQuestionUtilisateur();
            $mentionLegales = afficherMentionLegale();

            if(isset($_GET['delete'])){
                echo 'utilisateur a supprimé ' . $_GET['id'];
            
                    supprimerUtilisateur($_GET['id']);
                    header('location:admin.php?successDelete=true'); 
                    exit();
            }
            if(isset($_GET['successDelete'])){
                echo '<p>Utilisateur supprimé</p>'; 
            }

            if(isset($_GET['maintenanceOn'])){
                maintenanceOn();
                header('location:admin.php?'); 
                exit();
            }

            if(isset($_GET['maintenanceOff'])){
                maintenanceOff();
                header('location:admin.php?'); 
                exit();
            }

            if($_POST){
                if(isset($_POST['envoyer'])){
                    modifierMentionLegale($_POST['editeur_du_site'],$_POST['responsable_editorial'],$_POST['tel'],$_POST['email'],$_POST['herbergeur'],$_POST['developpement'],$_POST['conditions_utilisations'],$_POST['cookies']);
                }elseif(isset($_POST['envoie'])){
                    ini_set('sendmail_from', 'nitar77190@gmail.com');
                    mail($_POST['email'], $_POST['objet'], $_POST['reponse']);
                    supprimerQuestionUtilisateur($_POST['email']);
                    header('location:admin.php'); 
                    exit();
                }elseif(isset($_POST['envoi'])){
                    $utilisateurNews = utilisateursNewsletter();
                    ini_set('sendmail_from', 'nitar77190@gmail.com');
                    foreach($utilisateurNews as $key):
                    mail($key->email_user, $_POST['titre'], $_POST['contenue']);
                    endforeach;
                    header('location:admin.php?'); 
                    exit();
                }
            }
        ?>
        <main role="main" class="flex-shrink-0" id="body">
            <div class="container">
                <?php echo "<h1>Nos utilisateurs :</h1>"?>
                    <table class=" table table-dark">
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th>Mot de passe</th>
                            <th>Commandes</th>
                            <th>admin</th>
                            <th>supprimer</th>
                        </tr>
                        <?php foreach ($utilisateurs as $key) : ?>
                            <tr>
                                <th><?php echo "<a href=modifeUtilisateur.php?id=$key->id_user&nom=$key->nom_user>"?><?php echo "$key->nom_user";?></a></th>
                                <th><?php echo "$key->prenom_user"; ?></th>
                                <th><?php echo "$key->email_user"; ?></th>
                                <th><?php echo "$key->mot_de_passe_user"; ?></th>
                                <th><?php echo "<a href=gestionCommande.php?id=$key->id_user&nom=$key->nom_user>"?><?php echo "$key->commandes_passees"; ?></th>
                                <th><?php echo "$key->admin"; ?></th>
                                <th><a href="?delete=true&id=<?= $key->id_user?>">supprimer</a></th>
                            </tr>                
                        <?php endforeach; ?>
                    </table>
            </div>
            <div class="container">
                <button class="btn btn-warning"><a href="?maintenanceOn=true">Maintenance ON</a></button>
                <button class="btn btn-warning"><a href="?maintenanceOff=true">Maintenance OFF</a></button>
            </div>
            <?php foreach ($mentionLegales as $key) : ?>
                <div class="container">
                    <div class="form-style">
                        <form method="post" class="formulaire">
                            <legend>Mentions Legales</legend>
                            <fieldset>
                                <label for="field1"><span>Editeur du site <span class="required">
                                    <input class="form-control" type="text" name="editeur_du_site" value="<?php echo "$key->editeur_du_site"; ?>" placeholder="Editeur du site" required >
                                </label>
                            </fieldset>
                            <fieldset>
                                <label for="filed2"><span>Responsable éditorial <span class="required">
                                    <input class="form-control" type="text" name="responsable_editorial" value="<?php echo "$key->responsable_editorial"; ?>" placeholder="Responsable éditorial" required>
                                </label>
                            </fieldset>
                            <fieldset>
                                <label for="filed3"><span>Téléphone <span class="required">
                                    <input class="form-control" type="tel" name="tel" value="<?php echo "$key->telephone"; ?>" placeholder="Téléphone" required>
                                </label>
                            </fieldset>
                            <fieldset>
                                <label for="filed4"><span>Email <span class="required">
                                    <input class="form-control" type="text" name="email" value="<?php echo "$key->email"; ?>" placeholder="email" required>
                                </label>
                            </fieldset>
                            <fieldset>
                                <label for="filed5"><span>Herbergeur <span class="required">
                                    <input class="form-control" type="text" name="herbergeur" value=" <?php echo "$key->hebergeur"; ?>" placeholder="Herbergeur" required>
                                </label>
                            </fieldset>
                            <fieldset>
                                <label for="filed6"><span>Développement <span class="required">
                                    <input class="form-control" type="text" name="developpement" value="<?php echo "$key->developpement"; ?>" placeholder="Développement" required>
                                </label>
                            </fieldset>
                            <fieldset>
                                <label for="filed7"><span>Conditions d'utilisations <span class="required">
                                    <input class="form-control" type="text" name="conditions_utilisations" value="<?php echo "$key->condition_utilisation"; ?>; ?>"  placeholder="Conditions d'utilisations" required />
                                </label>
                            </fieldset>
                            <fieldset>
                                <label for="filed8"><span>Cookies <span class="required">
                                    <input class="form-control" type="text" name="cookies"  value="<?php echo "$key->cookie"; ?>" placeholder="Cookies" required>
                                </label>
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
                </div>
                <?php endforeach?>
                    
                    <div class="container">
                        <h1>Question des utilisateur :</h1>
                        <?php foreach ($question as $key) : ?>
                            <h6><?php echo "$key->objet" ?></h6>
                            <p><?php echo "$key->message" ?></p>
                            <form method="post" class="formulaire">
                            <fieldset>
                                <input type="hidden" name="email" value=<?php echo "$key->email_user"?>>
                                <input type="hidden" name="objet" value=<?php echo "$key->objet"?>>
                                <textarea class="form-control" name="reponse" rows="3" placeholder="reponse" required></textarea>
                                <input class="btn btn-info" type="submit" name="envoie" value="Envoyer" />
                            </fieldset>
                            </form>
                        <?php endforeach; ?>
                    </div>

                    <div class="container">
                        <h1>Nos newsletter</h1>
                        <form method="post" class="formulaire">
                            <fieldset>
                                <input type="text" class="form-control" name="titre" placeholder="le titre de la newsletter" required/>
                                <textarea class="form-control" name="contenue" rows="3" placeholder="contenu de la newsletter" required></textarea>
                                <input class="btn btn-info" type="submit" name="envoi" value="Envoyer" />
                            </fieldset>
                            </form>
                    </div>

                    <p id="changeOK"></p>
            
            <div class="categorie">
                <label for="select" class="label">Catégorie :</label>
                <select name="theme" id="select">
                    <option value="ho" class="ho">Horror</option>
                    <option value="jap" class="jap">Japonais</option>   
                    <option value="val" class="val">Saint Valentin</option>   
                    <option value="noel" class="noel">Noel</option>
                </select>
            </div>
            <button id="change">Appliquer les changements</button>
        </main>
        <?php
            if (isset($_SESSION['nom'])) {
                echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['nom']."";
                echo '<br><a href="./deconnexion.php">Deconnexion</a></p>';
            }else{
                header ('location: identification.php');
            }
        
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="../script.js"></script>
        <?php include('../header_footer/navbar.html');?>
    </body>
</html>