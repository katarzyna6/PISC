<?php
// variables contenant des regex à tester :
$exp1 = "/^([0-9]{5})$/"; //code postal
$exp2 = "/^[\w\.-]+@[\w-]+\.[a-zA-Z]{2,6}$/"; //adresse mail
$exp3 = "/^[\d]{2,4}[-|\/][\d]{2}[-|\/][\d]{2,4}$/"; //dates formats JJ/MM/AA, JJ/MM/AA, AAAA-MM-JJ etc...
$exp4 = "/^[\w-]$/"; //pseudo
$exp5 = "/^[a-zA-Z'àâäéèêôöëùûüçÀÂÉÈÔÙÛÇ\s-]+$/";//nom
$exp6 = "/^[a-zA-ZàâäéèêôöëùûüçÀÂÉÈÔÙÛÇ-]+$/";//prénom
$exp7 = "/^[^\w]+/";// au moins 1 caractère "spécial"
$exp8 = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^\w]).{8,}$/";
// au moins une lettre minuscule, une majuscule, un chiffre, 1 caractère "spécial", au moins 8 caractères
$mdp1 = 'chucky-458@gmail.fr';

// fonction qui teste des valeurs possibles
if(preg_match($exp2, $mdp1)) {
    echo "OK email";
} else {
    echo "problème...";
}

/*$_post1 = '<strong>Moi</strong>'; 
$_post1 = strip_tags($_post1);

echo $_post1;*/
// $id = sha1(uniqid());
// echo $id;
