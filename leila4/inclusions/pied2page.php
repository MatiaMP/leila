<?php
    // Charger les textes
    include('textes/fr/i18n.txt.php');
?>    
    <footer>
      <h2><?= $pp_infoTitre; ?></h2>
      <p><?= $pp_heuresOuverture1; ?><br><?= $pp_heuresOuverture2; ?></p>
      <p><?= $pp_etiquetteReservation; ?> 
        <span class="gras"><?= $en_telephone; ?></span>
      </p>
      <p class="adresse">
        <a href="https://goo.gl/maps/9pTkr" target="lien-externe" title="<?= $pp_titreImageCarte; ?>">
          <img src="images/iu/nav-icone-google-maps.png" alt="Carte">
        </a>
        <?= $en_addresse; ?>
      </p>
    </footer>
  </div>
  <!-- Droits d'utilisation et de reproduction réservés -->
  <p class="droits">
    &copy;2018-2021
    <br>Toute reproduction interdite excepté dans le cadre académique des cours 
    <br>au département de Techniques d'intégration multimédia au Collège de Maisonneuve
  </p>
</body>
</html>