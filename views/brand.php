<h1>DILEX</h1>
    <div class="container">

        <!-- 3. Attention, l'affichage de tes produits reprennent ta maquette, or, ces produits doivent provenir de ta base de données
        il faut donc automatiser l'affichage ! Dans un premier temps tu peux, par exemple, mettre tes données dans un tableau php
        et boucler dessus pour afficher tes div, ce qui permettra d'afficher les bonnes informations dans ta modale -->


        <?php foreach($donnees as $donnee): ?>

            <div class="produit">
                <div class="photo"> 
                    <div class="overlay">

                        <a href="#"><img src="<?= $donnee["image"]?>" alt="dilex"></a>

                        <a class="link" href="index?route=item&item=<?= $donnee["id"]?>"><p><?= $donnee["nom"]?></p></a>

                        <button class="myBtn" id="myBtn-<?= $donnee["id"]?>">Voir le produit</button>

                        <p>Prix : <?= $donnee["prix"]?> €</p>

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
        <h2>Nom du produit</h2>
    </div>

    <div class="modal-body">
        <p>Description text</p>
        <div class="modal-photo-container">
            <div class="photos_modal"><img src="img\DILEX\1.jpg"  alt="dilex"></div>
            <div class="photos_modal"><img src="img\DILEX\1_2.jpg"alt="dilex"></div>
            <div class="photos_modal"><img src="img\DILEX\1_3.jpg"alt="dilex"></div>
        </div>   

      
        <p>Note moyenne : 10</p>
        <a href="#">Voir les avis</a><br>
        <a href="#">Laissez votre note et commentaire</a>

        <div class="modal-footer">
            <h3>Prix : xx €</h3>
        </div>
  </div>
  
</div>
    

