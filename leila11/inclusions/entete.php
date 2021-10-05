<?php
  // 

  // Langues disponibles
  $languesDisponibles = [];
  $nomsDesLangues = [];
  $contenuDossierTextes = scandir('textes');
  foreach($contenuDossierTextes as $nomDossier) {
    if($nomDossier != '.' && $nomDossier != '..') {
      $codeEtNomLangue = explode('-', $nomDossier);
      $languesDisponibles[] = $codeEtNomLangue[0];
      $nomsDesLangues[$codeEtNomLangue[0]] = $codeEtNomLangue[1];
    }
  }

  // i18n
  // A - Déterminer la langue par défaut
  $langueChoisie = 'fr';

  // B - Vérifier si l'utilisateur a déjà fait un choix de langue auparavant.
  // Si tel est le cas, le tableau $_CCOKIE contiendra un témoin HTTP nommé 
  // 'leila_langue' (voir le code de l'étape C plus loin)
  if(isset($_COOKIE['leila_langue']) && in_array($_COOKIE['leila_langue'], $languesDisponibles)) {
    $langueChoisie = $_COOKIE['leila_langue'];
  }

  // C - Si l'utilisateur choisi une langue en cliquant un lien dans la navigation en haut de la page
  if(isset($_GET['langue']) && in_array($_GET['langue'], $languesDisponibles)) {
    $langueChoisie = $_GET['langue'];
    
    // C2 - Retenir le choix de langue de l'utilisateur dans un témoin HTTP (cookie)
    setcookie('leila_langue', $langueChoisie, time() + 365*24*60*60*2); // expire dans 2 ans
  }

  // D - On est enfin prêt à charger le fichier contenant les textes dans langue choisie
  include('textes/' . $langueChoisie . '-' . $nomsDesLangues[$langueChoisie] . '/i18n.txt.php');

  // Gérer le choix d'une citation aléatoire.
  
  /**
   * !!!!!!! À déplacer car fonctionne pas dans les autres pages que Menu et Vins
   * 
   */

  // Idéalement j'aimerai avoir une variable comme celle-là :
  /*
  $citation = [
    "texte"   =>  "Le texte de la citation",
    "auteur"  =>  "Monsieur Untel"
  ];
  */
  // Étape 1 : Accéder au fichier
  // Remarquez l'interpolation de la variable $page à l'intérieur de la chaîne de caractères
  $citationsChaine = file_get_contents("data/citations-$page.json"); 
  // echo $citationsChaine;
  
  // Étape 2 : Interpréter ("parser", ou analyser syntaxiquement) le code JSON dans $citationsChaine
  $citationsTab = json_decode($citationsChaine, true);
  // Afficher le tableau complet pour déboguage :
  //print_r($citationsTab);
  // Afficher uniquement le tableau des citations dans la langue choisie sur le site
  print_r($citationsTab[$langueChoisie]);


?>
<!-- Entête commune -->
<!DOCTYPE html>
<html>
<head>
  <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:700,900|Roboto+Slab:300,700|Roboto:700,400' rel='stylesheet' type='text/css'>
  <meta charset="UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <!-- Pour les deux prochaines expressions PHP, voir le 
  tableau '$meta' dans le fichier des textes ('i18n.txt.php') -->
  <title><?= $meta[$page]["titre"]; ?> | Restaurant Leila</title>
  <meta name="description" content="<?= $meta[$page]["desc"]; ?>">
  <link rel="stylesheet" href="css/ext/normalize.css">
  <link rel="stylesheet" href="css/leila.css">
</head>
<body>
  <div id="conteneur" class="page-<?php echo $page ?>">
    <header>
      <div class="barre-haut">
        <nav class="social">
          <a href="http://www.facebook.com" target="lien-externe">
            <img alt="Facebook" src="images/iu/nav-icone-facebook.svg">
          </a>
          <a href="http://www.twitter.com" target="lien-externe">
            <img alt="Twitter" src="images/iu/nav-icone-twitter.svg">
          </a>
        </nav>
        <?php
          // Afficher le lien vers la page d'accueil uniquement lorsque
          // nous ne sommes pas sur la page d'accueil
          if ($page != 'accueil') {
        ?>
          <h1 class="logo"><a href="index.php">LEILA</a></h1>
        <?php
          }
        ?>
        <nav class="i18n">
          <?php foreach($languesDisponibles as $codeLangue) {  ?>
            <a href="?langue=<?= $codeLangue; ?>" class="<?php if($langueChoisie == $codeLangue) {echo 'actif';} ?>" title="<?= $nomsDesLangues[$codeLangue]; ?>"><?= $codeLangue; ?></a>
          <?php } ?>
        </nav>
      </div>
      <div class="titre-page">
        <h1><?= strtoupper($meta[$page]['h1']); ?></h1>
        <?php if($page == 'accueil') { ?>
          <h3><?php echo $ent_sousTitre; ?></h3>
        <?php } ?>
      </div>
      <?php if($page == 'accueil') { ?>
      <div class="info-utile">
        <p class="aujourdui"><?php echo $ent_heuresOuverture; ?></p>
        <p class="addresse"><?= $ent_adresse; ?></p>
        <p class="telephone"><?= $ent_telephone; ?></p>
      </div>
      <?php } ?>
      <nav class="nav-principale">
        <a href="menu.php" title="<?= $ent_altMenu; ?>" class="<?php if($page == 'menu') { echo 'actif'; } ?>">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="130px" height="130px" viewBox="0 0 130 130" enable-background="new 0 0 130 130" xml:space="preserve"> <g> <path class="icone" fill="#BBB" d="M65,1C29.7,1,1,29.7,1,65s28.7,64,64,64c35.3,0,64-28.7,64-64S100.3,1,65,1z M65,126C31.4,126,4,98.6,4,65 C4,31.4,31.4,4,65,4c33.6,0,61,27.4,61,61C126,98.6,98.6,126,65,126z M33.1,99.1h63v-68h-63V99.1z M36.1,34.1h57v62h-57V34.1z  M66.1,57.1h-18c-0.8,0-1.5,0.7-1.5,1.5s0.7,1.5,1.5,1.5h18c0.8,0,1.5-0.7,1.5-1.5S67,57.1,66.1,57.1z M66.1,81.1h-18 c-0.8,0-1.5,0.7-1.5,1.5s0.7,1.5,1.5,1.5h18c0.8,0,1.5-0.7,1.5-1.5S67,81.1,66.1,81.1z M66.1,69.1h-18c-0.8,0-1.5,0.7-1.5,1.5 s0.7,1.5,1.5,1.5h18c0.8,0,1.5-0.7,1.5-1.5S67,69.1,66.1,69.1z M66.1,45.1h-18c-0.8,0-1.5,0.7-1.5,1.5s0.7,1.5,1.5,1.5h18 c0.8,0,1.5-0.7,1.5-1.5S67,45.1,66.1,45.1z M81.1,57.1h-5c-0.8,0-1.5,0.7-1.5,1.5s0.7,1.5,1.5,1.5h5c0.8,0,1.5-0.7,1.5-1.5 S82,57.1,81.1,57.1z M81.1,81.1h-5c-0.8,0-1.5,0.7-1.5,1.5s0.7,1.5,1.5,1.5h5c0.8,0,1.5-0.7,1.5-1.5S82,81.1,81.1,81.1z M81.1,45.1 h-5c-0.8,0-1.5,0.7-1.5,1.5s0.7,1.5,1.5,1.5h5c0.8,0,1.5-0.7,1.5-1.5S82,45.1,81.1,45.1z M81.1,69.1h-5c-0.8,0-1.5,0.7-1.5,1.5 s0.7,1.5,1.5,1.5h5c0.8,0,1.5-0.7,1.5-1.5S82,69.1,81.1,69.1z" /> </g> </svg>
        </a>
        <a href="vins.php" title="<?= $ent_altVins; ?>" class="<?php if($page == 'vins') { echo 'actif'; } ?>">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="128px" height="128px" viewBox="0 0 128 128" enable-background="new 0 0 128 128" xml:space="preserve"> <defs></defs> <g> <defs> <rect id="SVGID_1_" width="128" height="128" /> </defs> <clipPath id="SVGID_2_"> <use xlink:href="#SVGID_1_" overflow="visible" /> </clipPath> <path clip-path="url(#SVGID_2_)" fill="#BBB" d="M64,3c33.636,0,61,27.364,61,61c0,33.635-27.364,61-61,61 C30.364,125,3,97.635,3,64C3,30.364,30.364,3,64,3 M64,0C28.654,0,0,28.654,0,64c0,35.346,28.654,64,64,64 c35.346,0,64-28.654,64-64C128,28.654,99.346,0,64,0" /> <path class="coupe" clip-path="url(#SVGID_2_)" fill="none" stroke="#BBB" stroke-width="3" stroke-linecap="round" stroke-miterlimit="10" d="  M83.817,32.017H44.182c-1.717,3.554-2.689,12.733-2.689,16.583c0,12.425,10.081,22.505,22.507,22.505S86.507,61.026,86.507,48.6  C86.507,44.75,85.535,35.571,83.817,32.017z" /> <line clip-path="url(#SVGID_2_)" fill="none" stroke="#BBB" stroke-width="3" stroke-linecap="round" stroke-miterlimit="10" x1="64" y1="71.104" x2="64" y2="95.388" /> <line clip-path="url(#SVGID_2_)" fill="none" stroke="#BBB" stroke-width="3" stroke-linecap="round" stroke-miterlimit="10" x1="53.932" y1="95.983" x2="74.068" y2="95.983" /> </g> </svg>
        </a>
        <a href="javascript: void(0);" title="<?= $ent_altReservation; ?>">
          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="130px" height="130px" viewBox="0 0 130 130" enable-background="new 0 0 130 130" xml:space="preserve"> <path fill="#BBB" d="M65,0.7c-35.3,0-64,28.7-64,64c0,35.3,28.7,64,64,64s64-28.7,64-64C129,29.4,100.3,0.7,65,0.7z M65,125.7 c-33.6,0-61-27.4-61-61c0-33.6,27.4-61,61-61s61,27.4,61,61C126,98.4,98.6,125.7,65,125.7z M65,29.1c-19.7,0-35.6,15.9-35.6,35.6 c0,19.7,15.9,35.6,35.6,35.6s35.6-15.9,35.6-35.6C100.6,45.1,84.7,29.1,65,29.1z M65,97.2c-17.9,0-32.5-14.6-32.5-32.5 S47.1,32.2,65,32.2s32.5,14.6,32.5,32.5S82.9,97.2,65,97.2z M78.3,44.3c-0.7-0.5-1.7-0.3-2.1,0.5L64.6,62.7l-11.2-9.4 c-0.7-0.6-1.6-0.5-2.2,0.2c-0.6,0.7-0.5,1.6,0.2,2.2l13.9,11.7l13.4-20.8C79.2,45.8,79,44.8,78.3,44.3z" /> </svg>
        </a>
      </nav>
    </header>