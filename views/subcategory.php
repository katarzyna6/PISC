<h1>Bauté du visage</h1>
    <div class="container">

        <?php foreach($donnees as $donnee): ?>

            <div class="produit">
                <div class="photo"> 
                    <div class="overlay">

                        <a href="#"><img src="<?= $donnee["image"]?>" alt="dilex"></a>

                        <a class="link" href="index?route=subcategory=<?= $donnee["id"]?>"><p><?= $donnee["nom"]?></p></a>

                        <button class="myBtn" id="myBtn-<?= $donnee["id"]?>">Voir le produit</button>

                        <p>Prix : <?= $donnee["prix"]?> €</p>

                    </div>
                </div>               
            </div>

        <?php endforeach ?>