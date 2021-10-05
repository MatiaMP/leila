<?php
  // Définir l'identifiant de la page
  $page = 'accueil';

  // Inclure l'entête
  include('inclusions/entete.php');
?>
    <div class="contenu-principal">
      <h2><?= $acc_titrePage; ?></h2>
      <p><img src="images/accueil-cuisine.jpg" alt="<?= $acc_introImgAlt; ?>"><?= $acc_introP1; ?></p>
      <p><?= $acc_introP2; ?></p>
    </div>
<?php
  // Inclure le pied de page
  include('inclusions/pied2page.php');
?>