<h1><?= $view["datas"]["categories"]->getName() ?></h1>
    <div class="container">

        <?php foreach($view["datas"] as $data): ?>

            <div class="produit">
                <div class="photo"> 
                    <div class="overlay">

                        <a href="index?route=item"><img src="<?= $data["image"]?>" alt="image"></a>

                        <a class="link" href="index?route=item&item=<?= $data["id_item"]?>"><p><?= $data["name"]?></p></a>

                        <button class="myBtn" id="myBtn-<?= $data["id_item"]?>">Voir le produit</button>

                        <p>Prix : <?= $data["price"]?> €</p>

                    </div>
                </div>               
            </div>

        <?php endforeach ?>
  

    

