    <footer>
      <h2><?= $pdp_infoTitre; ?></h2>
      <p><?= $pdp_heuresOuverture1; ?><br><?= $pdp_heuresOuverture2; ?></p>
      <p><?= $pdp_etiquetteReservation ; ?>
        <span class="gras"><?= $ent_telephone; ?></span>
      </p>
      <p class="adresse">
        <a href="https://goo.gl/maps/9pTkr" target="lien-externe" title="<?= $pdp_titreLienCarte; ?>">
          <img src="images/iu/nav-icone-google-maps.png" alt="<?= $pdp_altImageCarte; ?>">
        </a>
        <?= $ent_adresse; ?>
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