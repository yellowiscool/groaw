<?php

define('NOM_APPLICATION', 'Groaw');

$LISTE_CTRLS = array(
	'Connexion' => 'Connexion',
	'Boites'	=> 'Boites aux lettres',
	'Courriels'		=> 'Gestion des courriels'
);

define('FORMAT_DATE_JOUR',		'Aujourd\'hui à %Hh%M');
define('FORMAT_DATE_SEMAINE',	'%A à %Hh%M');
define('FORMAT_DATE_NORMAL',	'%d/%m/%Y à %Hh%M');

define('FUSEAU_HORAIRE', 'Europe/Paris');

define('SERVEUR_IMAP','{localhost:4567/imap/ssl/novalidate-cert}');

// Les mails peuvent définir un contenu alternatif
// Voici les types que l'on préfère par ordre de préférence

$PREFERENCES_MIME = array(
    'PLAIN',    // Puis on préfère le texte
    'HTML',     // D'abord le HTML
    'JPEG',     // Puis le jpeg
    'PNG'       // Puis le png
);

define('DEBUG',true);
?>
