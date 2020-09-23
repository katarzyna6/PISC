<?php
$cat = $view['datas']['category']; 
$items = $view['datas']['items'];
$images = $view['datas']['images'];

// var_dump($items);
// var_dump($images);
?>
<h1><?= $cat->getName() ?></h1>
    <div class="container">

        <?php foreach($items as $item): ?>

            <div class="produit">
                <div class="photo"> 
                    <div class="overlay">

                        <a href="item">
                            <?php foreach($images as $image) : ?>
                                <?php if($item->getIdItem() == $image->getIdItem()) :?>
                                <div class="image_accueil"><img src="img/<?=$image->getName(); ?>"></div>
                                <?php break; ?>
                                <?php endif; ?>   
                            <?php endforeach?>
                        </a>

                        <a class="link" href="item-<?= $item->getIdItem()?>"><p><?= $item->getName()?></p></a>

                        <p class="description_item"><?= htmlspecialchars($item->getName())?></p>

                        <button class="myBtn" id="myBtn-<?= $item->getIdItem()?>">Voir le produit</button>

                        <p>Prix : <?= $item->getPrice()?> €</p>

                    </div>
                </div>               
            </div>

        <?php endforeach ?>
    </div>
  

    

