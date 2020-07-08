<?php

$item = [
    "id" => 1,
    "nom" => "Lingettes hydratantes",
    "image1" => "img\DILEX\1.jpg",
    "image2" => "img\DILEX\1_2.jpg",
    "image3" => "img\DILEX\1_3.jpg",
    "description" => "Les lingettes nettoyantes et désinfectantes avec huile d'argan, huile d'amande, vitamine E, sans paraben.</p>
    <p>Appropriés lorsqu'il n'y a pas de conditions de toilette, idéales pour les soins des malades et des personnes âgées.</p>
    <p>Produit convient pour une utilisation quotidienne, ne dessèche pas la peau.",
    "prix" => 15
];


$donnees = [
    
];


?>


<h1>DILEX</h1>
<?php foreach($donnees as $donnee): ?>
<div class="name"><h2><?= $donnee["nom"]?><h2></div>
<div class="product">
    <div class="item1">
        <img src="img\<?= $donnee["image1"]?>" width="175" height="150" alt="dilex">
    </div>

    <div class="item1">
        <img src="img\<?= $donnee["image2"]?>" width="175" height="150" alt="dilex">
    </div>

    <div class="item1">
        <img src="img\<?= $donnee["image3"]?>" width="175" height="150" alt="dilex">
    </div>

<div class="description"><p><?= $donnee["description"]?></p></div>

<div class="prix">
    <p><?= $donnee["prix"]?></p>
</div>

<?php endforeach ?>









