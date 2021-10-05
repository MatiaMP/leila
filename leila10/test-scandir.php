<?php
// Exemples d'accès au système de fichiers

// Exemple 1 : Lecture du contenu d'un dossiers
$contenuTextes = scandir('textes');
// Afficher le tableau obtenu (pour débogage)
//print_r($contenuTextes);

// Parcourir le tableau obtenu et afficher uniquement les noms des dossiers réels
for($i = 0; $i < count($contenuTextes); $i++) {
    // Ne considérer que les dossiers réels (c'est à dire, sans le '.' et le '..')
    if($contenuTextes[$i] != '.' && $contenuTextes[$i] != '..') {
        echo $contenuTextes[$i]."<br>";
    }
}

?>