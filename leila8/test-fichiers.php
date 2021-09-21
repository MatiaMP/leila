<?php
// Exemples d'accès au système de fichiers

// Exemple 1 : Lecture du contenu d'un dossiers
$contenuTextes = scandir('textes', 1);
// Afficher le tableau obtenu (pour débogage)
// print_r($contenuTextes);

// Parcourir le tableau obtenu et afficher uniquement les noms des dossiers réels
for($i = 0; $i < count($contenuTextes) -2; $i++) {
    // Ne considerer que les dossiers reels (c'est a dire sans le "." et le "..")
    if($contenuTextes[$i]) != "." && $contenuTextes[$1] != ".." {
    echo $contenuTextes[$i]."<hr>";
    }
}
?>