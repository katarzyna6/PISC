<?php

$item1 = [
    "id" => 1,
    "nom" => "Lingettes hydratantes",
    "image" => "img\DILEX\1.jpg",
    "prix" => 15
];

$item2 = [
    "id" => 2,
    "nom" => "Serviettes hygiéniques taille M",
    "image" => "img\DILEX\2.jpg",
    "prix" => 10
];

$item3 = [
    "id" => 3,
    "nom" => "Serviettes hygiéniques taille L",
    "image" => "img\DILEX\3.jpg",
    "prix" => 10
];

$item4 = [
    "id" => 4,
    "nom" => "Protège-slip ultra fin",
    "image" => "img\DILEX\4.jpg",
    "prix" => 10
];

$item5 = [
    "id" => 5,
    "nom" => "100 Mouchoirs, double épaisseur",
    "image" => "img\DILEX\5.jpg",
    "prix" => 10
];

$item6 = [
    "id" => 6,
    "nom" => "100 Mouchoirs, double épaisseur",
    "image" => "img\DILEX\6.jpg",
    "prix" => 10
];

$item7 = [
    "id" => 7,
    "nom" => "Coton-tige x200",
    "image" => "img\DILEX\7.jpg",
    "prix" => 10
];

$item8 = [
    "id" => 8,
    "nom" => "Lingettes hydratantes pour le visage et les mains",
    "image" => "img\DILEX\8.jpg",
    "prix" => 10
];

$item9 = [
    "id" => 9,
    "nom" => "Lingettes démaquillantes pour tous types de peau",
    "image" => "img\DILEX\9.jpg",
    "prix" => 10
];

$item10 = [
    "id" => 10,
    "nom" => "Lingettes intimes à l'huile de noisette",
    "image" => "img\DILEX\10.jpg",
    "prix" => 10
];

$item11 = [
    "id" => 11,
    "nom" => "Lingettes hygiéniques pour homme",
    "image" => "img\DILEX\11.jpg",
    "prix" => 10
];

$item12 = [
    "id" => 12,
    "nom" => "Lingettes démaquillantes x70",
    "image" => "img\DILEX\12.jpg",
    "prix" => 10
];

$donnees = [
    $item1, 
    $item2,
    $item3,
    $item4,
    $item5,
    $item6,
    $item7,
    $item8,
    $item9,
    $item10,
    $item11,
    $item12
];


?>

<h1>DILEX</h1>
        <div class="container">

            <!-- 3. Attention, l'affichage de tes produits reprennent ta maquette, or, ces produits doivent provenir de ta base de données
            il faut donc automatiser l'affichage ! Dans un premier temps tu peux, par exemple, mettre tes données dans un tableau php
            et boucler dessus pour afficher tes div, ce qui permettra d'afficher les bonnes informations dans ta modale -->


            <?php foreach($donnees as $donnee): ?>

            <div class="produit">
                <figure class="photo"> 
                    <figcaption class="overlay">

                        <a href="#"><img src="img/DILEX/<?= $donnee["image"]?>" width="350" height="300" alt="dilex"></a>

                        <a class="link" href="index?route=item"><p><?= $donnee["nom"]?></p></a>

                        <button class="myBtn" id="myBtn-<?= $donnee["id"]?>">Voir le produit</button>

                        <p>Prix : <?= $donnee["prix"]?> €</p>

                    </figcaption>
                </figure>               
            </div>

            <?php endforeach ?>
            

            <!-- <div class="produit">
                <figure class="photo"> 
                    <figcaption class="overlay">
                        <a href="#"><img src="img\DILEX\2.jpg" width="350" height="300" alt="dilex"></a>
                        <a class="link" href="#"><p>Serviettes hygiéniques taille M</p></a>
                        <button class="myBtn" id="myBtn-2">Voir le produit</button>
                        <p>Prix</p>
                    </figcaption>
                </figure>               
            </div>

            <div class="produit">
                <figure class="photo"> 
                    <figcaption class="overlay">
                        <a href="#"><img src="img\DILEX\3.jpg" width="350" height="300" alt="dilex"></a>
                        <a class="link" href="#"><p>Serviettes hygiéniques taille L</p></a>
                        <button class="myBtn" id="myBtn-3">Voir le produit</button>
                        <p>Prix</p>
                    </figcaption>
                </figure>               
            </div>

            <div class="produit">
                <figure class="photo"> 
                    <figcaption class="overlay">
                        <a href="#"><img src="img\DILEX\4.jpg" width="350" height="300" alt="dilex"></a>
                        <a class="link" href="#"><p>Protège-slip ultra fin</p></a>
                        <button class="myBtn" id="myBtn-4">Voir le produit</button>
                        <p>Prix</p>
                    </figcaption>
                </figure>               
            </div>

            <div class="produit">
                <figure class="photo"> 
                    <figcaption class="overlay">
                        <a href="#"><img src="img\DILEX\5.jpg" width="350" height="300" alt="dilex"></a>
                        <a class="link" href="#"><p>100 Mouchoirs, double épaisseur</p></a>
                        <button class="myBtn" id="myBtn-5">Voir le produit</button>
                        <p>Prix</p>
                    </figcaption>
                </figure>               
            </div>

            <div class="produit">
                <figure class="photo"> 
                    <figcaption class="overlay">
                        <a href="#"><img src="img\DILEX\6.jpg" width="350" height="300" alt="dilex"></a>
                        <a class="link" href="#"><p>100 Mouchoirs, double épaisseur</p></a>
                        <button id="myBtn">Voir le produit</button>
                        <p>Prix</p>
                    </figcaption>
                </figure>               
            </div>

            <div class="produit">
                <figure class="photo"> 
                    <figcaption class="overlay">
                        <a href="#"><img src="img\DILEX\7.jpg" width="350" height="300" alt="dilex"></a>
                        <a class="link" href="#"><p>Coton-tige x200</p></a>
                        <button id="myBtn">Voir le produit</button>
                        <p>Prix</p>
                    </figcaption>
                </figure>               
            </div>

            <div class="produit">
                <figure class="photo"> 
                    <figcaption class="overlay">
                        <a href="#"><img src="img\DILEX\8.jpg" width="350" height="300" alt="dilex"></a>
                        <a class="link" href="#"><p>Lingettes hydratantes pour le visage et les mains</p></a>
                        <button id="myBtn">Voir le produit</button>
                        <p>Prix</p>
                    </figcaption>
                </figure>               
            </div>

            <div class="produit">
                <figure class="photo"> 
                    <figcaption class="overlay">
                        <a href="#"><img src="img\DILEX\9.jpg" width="350" height="300" alt="dilex"></a>
                        <a class="link" href="#"><p>Lingettes démaquillantes pour tous types de peau</p></a>
                        <button id="myBtn">Voir le produit</button>
                        <p>Prix</p>
                    </figcaption>
                </figure>               
            </div>

            <div class="produit">
                <figure class="photo"> 
                    <figcaption class="overlay">
                        <a href="#"><img src="img\DILEX\10.jpg" width="350" height="300" alt="dilex"></a>
                        <a class="link" href="#"><p> Lingettes intimes à l'huile de noisette</p></a>
                        <button id="myBtn">Voir le produit</button>
                        <p>Prix</p>
                    </figcaption>
                </figure>               
            </div>

            <div class="produit">
                <figure class="photo"> 
                    <figcaption class="overlay">
                        <a href="#"><img src="img\DILEX\11.jpg" width="350" height="300" alt="dilex"></a>
                        <a class="link" href="#"><p>Lingettes hygiéniques pour homme</p></a>
                        <button id="myBtn">Voir le produit</button>
                        <p>Prix</p>
                    </figcaption>
                </figure>               
            </div>

            <div class="produit">
                <figure class="photo"> 
                    <figcaption class="overlay">
                        <a href="#"><img src="img\DILEX\12.jpg" width="350" height="300" alt="dilex"></a>
                        <a class="link" href="#"><p>Lingettes démaquillantes x70</p></a>
                        <button id="myBtn">Voir le produit</button>
                        <p>Prix</p>
                    </figcaption>
                </figure>               
            </div>

        </div> -->


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">X</span>
      <h2>Nom du produit</h2>
    </div>
    <div class="modal-body">
      <p>Description text</p>
        <img  src="img\DILEX\1.jpg" width="300" height="250" alt="dilex">
        <img src="img\DILEX\1_2.jpg" width="300" height="250" alt="dilex">
        <img src="img\DILEX\1_3.jpg" width="300" height="250" alt="dilex">
    </div>
    <div class="modal-footer">
      <h3>Prix : xx €</h3>
    </div>
  </div>

</div>
    

