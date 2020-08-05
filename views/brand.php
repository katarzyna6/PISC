<?php
var_dump($view["datas"]);
?>

<h1><?= $view["datas"]["brand"]->getName() ?></h1>
    <div class="container">

        <!-- 3. Attention, l'affichage de tes produits reprennent ta maquette, or, ces produits doivent provenir de ta base de données
        il faut donc automatiser l'affichage ! Dans un premier temps tu peux, par exemple, mettre tes données dans un tableau php
        et boucler dessus pour afficher tes div, ce qui permettra d'afficher les bonnes informations dans ta modale -->


        <?php foreach($view["datas"] as $data): ?>

            <div class="produit">
                <div class="photo"> 
                    <div class="overlay">

                        <a href="#"><img src="<?= $data["image"]?>" alt="image"></a>

                        <a class="link" href="index?route=item&item=<?= $data["id_item"]?>"><p><?= $data["name"]?></p></a>

                        <button class="myBtn" id="myBtn-<?= $data["id_item"]?>">Voir le produit</button>

                        <p>Prix : <?= $data["price"]?> €</p>

                    </div>
                </div>               
            </div>

        <?php endforeach ?>
                               
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
<div class="modal-content">

    <div class="modal-header">
        <span class="close">X</span>
        <h2><?= $view["datas"]["brand"]->getName() ?></h2>
    </div>

    <div class="modal-body">
        <p><?= $view["datas"]["description"]->getDescription() ?></p>
        <div class="modal-photo-container">
            <div class="photos_modal"><img src="<?= $data["image"]?>" alt="image"></div>
            <div class="photos_modal"><img src="<?= $data["image"]?>" alt="image"></div>
            <div class="photos_modal"><img src="<?= $data["image"]?>" alt="image"></div>
        </div>   

      
        <p><?= $view["datas"]["note"]->getNote() ?></p>
        <a href="index?route=item&item=<?= $data["id_item"]?>"><p><?= $data["avis"]?>Voir les avis</a><br>
        <a href="index?route=comment.php">Laissez votre note et commentaire</a>

    </div>

        <div class="modal-footer">
            <h3><?= $view["datas"]["price"]->getPrice() ?></h3>
        </div>
</div>
  

    

