<h1><?= $view["datas"]["category"]->getName() ?></h1>
    <div class="container">

        <?php foreach($datas as $data): ?>

            <div class="produit">
                <div class="photo"> 
                    <div class="overlay">

                        <a href="#"><img src="<?= $data["image"]?>" alt="cat"></a>

                        <a class="link" href="index?route=category&id=<?= $data["id_category"]?>"><p><?= $data["name"]?></p></a>

                        <button class="myBtn" id="myBtn-<?= $data["id_item"]?>">Voir le produit</button>

                        <p>Prix : <?= $data["price"]?> €</p>

                    </div>
                </div>               
            </div>

        <?php endforeach ?>