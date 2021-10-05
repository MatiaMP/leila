<?php
  $page = 'menu';

  // Inclure l'entête
  include('inclusions/entete.php');
  //Obtenir citation aleatoire
  $citation = citationAleatoire($langueChoisie,) 'menu');
  
  // Gestion de l'affichage dynamique du menu

  // Etape 1 : Lire le contenu du fichier dans une chaine de characteres
  // Tester si le fichier existe avant...
  $menuChaine = file_get_content("data/menu-$langueChoisie.json");
  echo $menuChaine;

  // Etape 2: decoder la chaine JSON pour obtenir un tableau PHP
  $menuTableau = json_decode($menuChaine, true);
?>

    <div class="contenu-principal">
      <div class="citation">
        <img src="images/menu-citation.jpg" alt="">
        <blockquote>
          <?= $citation['texte']?>;
          <cite><?= $citation['auteur']?></cite>
        </blockquote>
      </div>
      <div class="carte">
        
      <!-- Boucle pour générer dynamiquement les sections du menu -->
      <?php foreach($menuTableau as $titreSection =>$platsSection){ ?>
        <section>
          <h2><?= $titreSection; ?></h2>
          <ul> 
            <!-- Boucle pour générer dynamiquement les plats dans la section de menu courante -->
            <<?php foreach($platsSection as $plat) { ?>
            <li>
              <span>Nom du plat<br><i>Description du plat</i></span>
              <span class="prix"><i class="article-menu-portion">(2 <?php $mnu_portions) ?></i>prix</span>
            </li>
            <?php } ?>
            <!-- Fin de la boucle plats d'une section -->

          </ul>
        </section>
        <?php } ?>
        <!-- Fin de la boucle des sections -->

      </div>
    </div>
<?php
  // Inclure le pied de page
  include('inclusions/pied2page.php');
?>