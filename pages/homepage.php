<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Accueil - Projet GameBox</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../Component/" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="../header_footer/navbar.html" rel="stylesheet">
  <link href="../header_footer/navbar_footer.css" rel="stylesheet">
</head>

<body class="blue-grey darken-4">
  <?php
      require_once('../inc/fonction.php');
      require_once('../inc/connect.php');

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

  <!-- Loading Page -->
  <div class="progress center valign">
    <div class="indeterminate"></div>
  </div>


  <!-- Background1 & son contenu - START -->
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container center">
        <img class="container" src="../img/GameBox.png" alt="GameBox Logo" />

        <!-- Script Toast -->
        <div class="row center">
          <a onclick="M.toast({html: 'Shop Indisponible. . .'})" href="#" id="download-button"
            class=" btn-large pulse waves-effect waves-dark teal blue-grey lighten-4 black-text">Acheter une Box</a>
        </div>

      </div>
    </div>
    <div class="parallax"><img id="background1" src="" alt="Background img 1"></div>
  </div>
  <!-- Background1 & son contenu - END -->

  <!-- À PROPOS - SECTION START -->
  <section id="APropos" class="section scrollspy">
    <div class="container">
      <div class="section">

        <div class="row">
          <div class="col s12 m12 center white-text">
            <h2 id="font">À Propos</h2>
            <p class="center light">Gamebox propose tous les mois des box de jeux et goodies sur différents thèmes. <br>
              Chaque mois nous vous proposons une box contenant quatres jeux et deux goodies. <br>
              Trois jeux et un goodies est connu à l'avance et le quatrième jeu ainsi que le dernier goodies sont des
              mystères.<br />
              Les objets mystères seront bien sur en lien avec le thème du mois.</p>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- À PROPOS - SECTION END -->




  <!-- Background2 & son contenu - START -->
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <!-- <div class="row center">   Titre Possible dans l'image
            <h4 class="header col s12 black-text">Jeux Disponibles</h4>
          </div> -->
      </div>
    </div>
    <div class="parallax"><img id="background2" src="" alt="Background img 2"></div>
  </div>
  <!-- Background2 & son contenu - END -->

  <!-- BOX MONTH - SECTION START -->
  <section id="BoxMonth" class="section scrollspy">

    <div class="container">
      <div class="section">

        <div class="row">
          <div class="container">
            <h2 class="center-align white-text">Contenu des Box</h2>
          </div>

          <!-- Carte 1 -->
          <div class="col s6 m4 l4">
            <!-- Small 4 - Medium 4 - Large 4  Une ligne divisée en 3 (max 12) -->
            <div class="card blue-grey lighten-4 hoverable">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../img/game-layersoffears.jpg" alt="Jeu Layers Of Fears">
              </div>
              <div class="card-content hoverable">
                <span class="card-title activator black-text" id="Card_title">Layers Of Fear<i
                    class="material-icons right">more_vert</i></span>
              </div>
              <div class="card-reveal blue-grey lighten-4">
                <span class="card-title black-text" id="Card_title">Layers Of Fear<i
                    class="material-icons right">close</i></span>
                <p class="flow-text" id="Card_para">La Bloober Team, petite équipe de développeurs indépendants basé en
                  Pologne, nous offre avec Layers of Fear non pas un jeu vidéo, mais une expérience.<br />
                  Ici, vous serez à la fois joueur et acteur tant dans les intéractions avec votre environnement qu'avec
                  les scenes que vous n'aurez le choix de subir.</p>
              </div>
            </div>
          </div>

          <!-- Carte 2 -->
          <div class="col s6 m4 l4">
            <!-- Small 4 - Medium 4 - Large 4  Une ligne divisée en 3 (max 12) -->
            <div class="card blue-grey lighten-4 hoverable">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../img/game-pumpkinjack.jpg" alt="Jeu Pumpkin Jack">
              </div>
              <div class="card-content hoverable">
                <span class="card-title activator black-text" id="Card_title">Pumpkin Jack<i
                    class="material-icons right">more_vert</i></span>
              </div>
              <div class="card-reveal blue-grey lighten-4">
                <span class="card-title black-text" id="Card_title">Pumpkin Jack<i
                    class="material-icons right">close</i></span>
                <p class="flow-text" id="Card_para">Pumpkin Jack est un jeu de plateforme 3D dans lequel vous incarnez
                  Jack, le Seigneur des Citrouilles !<br />
                  Dans ce jeu, vous êtes du coté du Mal et obéissez au Diable lui-même. Mêlant platformes et puzzles, le
                  jeu s'inspire du style graphique des jeux PS2</p>
              </div>
            </div>
          </div>

          <!-- Carte 3 -->
          <div class="col s12 m4 l4">
            <!-- Small 4 - Medium 4 - Large 4  Une ligne divisée en 3 (max 12) -->
            <div class="card blue-grey lighten-4 hoverable">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../img/game-deadbydaylight.jfif" alt="Jeu Dead By Daylight">
              </div>
              <div class="card-content hoverable">
                <span class="card-title activator black-text" id="Card_title">Dead By Daylight<i
                    class="material-icons right">more_vert</i></span>
              </div>
              <div class="card-reveal blue-grey lighten-4">
                <span class="card-title black-text" id="Card_title">Dead By Daylight<i
                    class="material-icons right">close</i></span>
                <p class="flow-text" id="Card_para">Dead By Daylight est un survival multi asymétrique disponible sur PC
                  qui vous place dans un groupe de 4 survivants devant éviter les assauts d'un tueur. Vous pourrez au
                  choix incarner l'un des membres du groupe de survivants ou le tueur lui-même dans des niveaux générés
                  de manières procédurale.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- Carte 4 -->
          <div class="col s6 m4 l4">
            <!-- Small 6 - Medium 6 - Large 6  Une ligne divisée en 2 (max 12) -->
            <div class="card blue-grey lighten-4 hoverable">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../img/goodies-deadbydaylight.jpg" alt="Goodies Dead By Daylight">
              </div>
              <div class="card-content hoverable">
                <span class="card-title activator black-text" id="Card_title">Goodies<i
                    class="material-icons right">more_vert</i></span>
              </div>
              <div class="card-reveal blue-grey lighten-4">
                <span class="card-title black-text" id="Card_title">Goodies<i
                    class="material-icons right">close</i></span>
                <p class="flow-text" id="Card_para">Pour compléter votre collection (sans parler du Goodies Mystère !)
                </p>
              </div>
            </div>
          </div>

          <!-- Carte 5 -->
          <div class="col s6 m4 l4">
            <!-- Small 6 - Medium 6 - Large 6  Une ligne divisée en 2 (max 12) -->
            <div class="card blue-grey lighten-4 hoverable">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../img/pinterro2.png" alt="Point d'interrogation Mystere">
              </div>
              <div class="card-content hoverable">
                <span class="card-title activator black-text" id="Card_title">Jeu Mystère<i
                    class="material-icons right">more_vert</i></span>
              </div>
              <div class="card-reveal blue-grey lighten-4">
                <span class="card-title black-text" id="Card_title">Jeu Mystere<i
                    class="material-icons right">close</i></span>
                <p class="flow-text" id="Card_para">Jeu selectionné en fonction du thème actuel</p>
              </div>
            </div>
          </div>

          <!-- Carte 6 -->
          <div class="col s12 m4 l4">
            <!-- Small 6 - Medium 6 - Large 6  Une ligne divisée en 2 (max 12) -->
            <div class="card blue-grey lighten-4 hoverable">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="../img/pinterro1.png" alt="Point d'interrogation Mystere">
              </div>
              <div class="card-content hoverable">
                <span class="card-title activator black-text" id="Card_title">Goodies Mystère<i
                    class="material-icons right">more_vert</i></span>
              </div>
              <div class="card-reveal blue-grey lighten-4">
                <span class="card-title black-text" id="Card_title">Goodies Mystère<i
                    class="material-icons right">close</i></span>
                <p class="flow-text" id="Card_para">Goodies selectionné en fonction du thème actuel</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- BOX MONTH - SECTION END -->



  <?php
      if (isset($_SESSION['nom'])) {
          echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['nom']."";
          echo '<br><a href="./deconnexion.php">Deconnexion</a></p>';
      }else{
          header ('location: identification.php');
      }        
    ?>
  <!-- Scripts : -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>

  <script>
    // Script Loading Page
    document.onreadystatechange = function () {
      if (document.readyState !== "complete") {
        document.querySelector(
          "body").style.visibility = "hidden";
        document.querySelector(
          ".progress").style.visibility = "visible";
      } else {
        document.querySelector(
          ".progress").style.display = "none";
        document.querySelector(
          "body").style.visibility = "visible";
      }
    };
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
  <script src="../script2.js" type="text/javascript"></script>
  <?php include('../header_footer/navbar.html');?>
</body>

</html>