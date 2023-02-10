<?php

    require_once('connect.php');

    function connexion(string $email, string $pass){
        global $pdo;
        $query = "SELECT * FROM user WHERE email_user = :email AND mot_de_passe_user = :pass";
        $prep = $pdo->prepare($query);
        $prep->bindValue(':email', $email);
        $prep->bindValue(':pass', $pass);
        $prep->execute();
        return $prep->fetch();
    }

    function utilisateursNewsletter(){
        global $pdo;
        $query = 'SELECT * FROM user WHERE newsletter = 1;';
        return $pdo->query($query)->fetchAll();
    }

    function afficherUtilisateurs(){
        global $pdo;
        $query = 'SELECT * FROM user;';
        return $pdo->query($query)->fetchAll();
    }

    function afficherUtilisateursParId(int $id){
        global $pdo;
        $query = 'SELECT * FROM user WHERE id_user = :id;';
        $prep = $pdo->prepare($query);
        $prep->bindValue(':id', $id, PDO::PARAM_INT);
        $prep->execute();
        return $prep->fetchAll();
    }

    function modiferUtilisateur(int $id, string $nom, string $prenom, string $email, string $motDePasse){
        global $pdo;
        $query = 'UPDATE `user` SET `nom_user`= :nom, `prenom_user`= :prenom, `email_user`= :email, `mot_de_passe_user`= :motDePasse WHERE `id_user`= :id;';
        $prep = $pdo->prepare($query);
        $prep->bindValue(':nom', $nom, PDO::PARAM_STR);
        $prep->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $prep->bindValue(':email', $email, PDO::PARAM_STR);
        $prep->bindValue(':motDePasse', $motDePasse, PDO::PARAM_STR);
        $prep->bindValue(':id', $id, PDO::PARAM_INT);
        $prep->execute();
    }

    function supprimerUtilisateur(int $id){
        global $pdo;
        $query = "DELETE FROM `user` WHERE id_user= '$id';";
        $pdo->exec($query);
    }

    function lesCommandeDunUtilisater(int $id){
        global $pdo;
        $query = 'SELECT * FROM commandes WHERE id_user = :id;';
        $prep = $pdo->prepare($query);
        $prep->bindValue(':id', $id, PDO::PARAM_INT);
        $prep->execute();
        return $prep->fetchAll();
    }

    function supprimerCommande(int $id){
        global $pdo;
        $query = "DELETE FROM `commandes` WHERE id_commande= '$id';";
        $pdo->exec($query);
    }

    function maintenanceOn(){
        global $pdo;
        $query = 'UPDATE `maintenance` SET en_maintenance = 1 WHERE id_maintenance = 1;';
        $pdo->query($query);
    }

    function maintenanceOff(){
        global $pdo;
        $query = 'UPDATE `maintenance` SET en_maintenance = 0 WHERE id_maintenance = 1;';
        $pdo->query($query);
    }

    function maintenance(){
        global $pdo;
        $query = 'SELECT en_maintenance FROM maintenance;';
        return $pdo->query($query)->fetchColumn();

    }

    function modifierMentionLegale(string $editeurSite, string $responsableEditorial, string $tele, string $email, string $hebergeur, string $developpement, string $conditionsUtilisation, string $cookies){
        global $pdo;
        $query = 'UPDATE `mention_legale` SET `editeur_du_Site`= :editeurSite, `responsable_editorial`= :responsableEditorial, `telephone`= :tele, `email`= :email, hebergeur = :hebergeur, developpement = :developpement, condition_utilisation = :conditionsUtilisation, cookie = :cookies  WHERE `id_mention`= 1;';
        $prep = $pdo->prepare($query);
        $prep->bindValue(':editeurSite', $editeurSite, PDO::PARAM_STR);
        $prep->bindValue(':responsableEditorial', $responsableEditorial, PDO::PARAM_STR);
        $prep->bindValue(':tele', $tele, PDO::PARAM_STR);
        $prep->bindValue(':email', $email, PDO::PARAM_STR);
        $prep->bindValue(':hebergeur', $hebergeur, PDO::PARAM_STR);
        $prep->bindValue(':developpement', $developpement, PDO::PARAM_STR);
        $prep->bindValue(':conditionsUtilisation', $conditionsUtilisation, PDO::PARAM_STR);
        $prep->bindValue(':cookies', $cookies, PDO::PARAM_STR);
        $prep->execute();
    }

    function afficherMentionLegale(){
        global $pdo;
        $query = 'SELECT * FROM mention_legale;';
        return $pdo->query($query)->fetchAll();
    }

    function afficheQuestionUtilisateur(){
        global $pdo;
        $query = 'SELECT * FROM page_contact;';
        return $pdo->query($query)->fetchAll();
    }

    function supprimerQuestionUtilisateur(string $email){
        global $pdo;
        $query = "DELETE FROM page_contact WHERE email_user = '$email'";
        $pdo->exec($query);
    }

?>