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

                        <a href="index?route=item">
                            <?php foreach($images as $image) : ?>
                                <?php if($item->getIdItem() == $image->getIdItem()) :?>
                                <img src="img/<?=$image->getName(); ?>">
                                <?php break; ?>
                                <?php endif; ?>   
                            <?php endforeach?>
                        </a>

                        <a class="link" href="index?route=item&item=<?= $item->getIdItem()?>"><p><?= $item->getName()?></p></a>

                        <button class="myBtn" id="myBtn-<?= $item->getIdItem()?>">Voir le produit</button>

                        <p>Prix : <?= $item->getPrice()?> €</p>

                    </div>
                </div>               
            </div>

        <?php endforeach ?>
    </div>
  

    

