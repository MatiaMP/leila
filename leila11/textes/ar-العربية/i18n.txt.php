<?php
// Textes statiques du site du restaurant Leila

// Meta
// On utilise ici un tableau associatif dont les éléments ont aussi des valeurs
// constituées d'autres tableaux associatifs.
// Documentation : https://www.php.net/manual/fr/language.types.array.php
$meta = [
    "accueil"   =>  [
                        "titre"  =>  "Welcome", 
                        "desc"   =>  "Restaurant Leila - Montreal",
                        "h1"     =>  "Leila"
                    ],
    "menu"      =>  [
                        "titre"  =>  "Our Menus", 
                        "desc"   =>  "Leila restaurant menu in Montreal. An eclectic and refined menu, combining creativity and tradition. Local products and specialties from Quebec.",
                        "h1"     =>  "Menu"
                    ],
    "vins"      =>  [
                        "titre"  =>  "Wine Menu", 
                        "desc"   =>  "Leila restaurant wine list in Montreal. Varied menu, including privately imported wines selected by our sommelier.",
                        "h1"     =>  "Wine List"
                    ]
];

// Entête
$ent_sousTitre = "BISTRONOMIC CUISINE";
$ent_heuresOuverture = "مفتوح اليوم حتى الساعة 11 مساءً.";
$ent_adresse = "275 Notre-Dame Street East, Montreal, Quebec";
$ent_telephone = "(514) 958-2580";

// Entête - Navigation principale
$ent_altMenu = "The Menus";
$ent_altVins = "Wine Menu";
$ent_altReservation = "Online reservation - coming soon";

// Pied de page
$pdp_infoTitre = "Practical Info";
$pdp_heuresOuverture1 = "Kitchen open from 11 a.m. to 10 p.m.";
$pdp_heuresOuverture2 = "Closed on Mondays.";
$pdp_etiquetteReservation = "For reservation:";
$pdp_titreLienCarte = "Click here to locate the restaurant on Google Maps";
$pdp_altImageCarte = "Map";

// Accueil
$acc_titrePage = "Creative Seasonal Cuisine";
$acc_introImgAlt = "In our kitchen";
$acc_introP1 = "This cozy house located a stone's throw from the Montreal Science Center offers undeniable charm. Its colonial decor and chic setting give it a cozy and cozy atmosphere that is particularly popular with demanding customers. Assisted in the dining room by her charming partner Léandre, Clémentine Matuvu offers a very personal cuisine. A chef of insatiable curiosity, she revisits her classics with talent and does not hesitate to think outside the box while respecting the seasons and their products with the market as a source of inspiration. Very pleasant garden in season.";
$acc_introP2 = "One of the oldest buildings in the city on ... rue Neuve, you can't make it up! The chef, passionate about her profession and wine, plays the « bistronomy » card to the full, focusing on high quality market products. A delight ... like the summer terrace";

// Menu
/* 
    Le texte de cette section du site représente du *contenu dynamique* (et non pas des textes statiques), et sera géré plus tard dans le cours (une exception pour les 2 mots "pour" et "personnes" utilisés dans la description des plats, que je voudrais discuter avec vous en classe).
*/
$mnu_portion = "حصص";
// Carte des vins
$vin_frmEtiquette = "Search: ";
$vin_frmPlaceholder = "By Country (examples : Quebec, France, Spain)";
?>