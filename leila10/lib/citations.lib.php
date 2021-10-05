<?php
// Librairie de fonctions pour gérer les citations


/**
 * Retourne une citation aléatoire
 * 
 * @param string $langue Code de la langue pour la citation demandée
 * @param string $page Identifiant de la page sur laquelle la citation sera utilisée
 * 
 * @return array Tableau associatif contenant une citation ('texte' et 'auteur')
 * 
 */
function citationAleatoire($langue, $page) {
    $citationsTab = json_decode(file_get_contents("data/citations-$page.json")
                                                                        , true);
    // S'il n'y a pas de citations dans la langue spécifiée, utiliser 'fr'
    /*
    if(isset($citationsTab[$langue])) {
        $citationsLangueChoisie = $citationsTab[$langue];
    }
    else {
        $citationsLangueChoisie = $citationsTab['fr'];
    }
    */

    // Ou, en utilisant l'opérateur ternaire de PHP 
    // (test) ? si vrai : sinon
    $citationsLangueChoisie = (isset($citationsTab[$langue])) ? $citationsTab[$langue] : $citationsTab['fr'] ;

    $posAlea = rand(0, count($citationsLangueChoisie)-1);
    return $citationsLangueChoisie[$posAlea];
}
?>