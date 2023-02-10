<?php
    require_once('../inc/fonction.php');

    if (isset($_POST['email']) && isset($_POST['pass']) && !empty($_POST['email'])&& !empty($_POST['email'])){
        $connexion = connexion($_POST['email'],$_POST['pass']);
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        if($connexion){
            session_start ();
            $_SESSION['admin'] = $connexion->admin;
            $_SESSION['nom'] = $connexion->nom_user;
            $_SESSION['id'] = $connexion->id_user;
            if($_SESSION['admin'] == 1){
                header ('location: admin.php');
            }else{
                header ('location: homepage.php');
            }
        }
    }else{
            header ('location: identification.php');
        }
?>