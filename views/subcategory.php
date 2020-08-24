<?php
$subcat = $view['datas']['subcategory']; 
$items = $view['datas']['items'];
$images = $view['datas']['images'];

// var_dump($items);
// var_dump($images);
?>
<h1><?= $subcat->getName() ?></h1>
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

                        <a class="link" href="index?route=item&id=<?= $item->getIdItem()?>"><p><?= $item->getName()?></p></a>

                    </div>
                </div>  
                
                <button class="myBtn"id="myBtn- <?= $item->getIdItem()?>">Voir le produit</button>

                <p>Prix : <?= $item->getPrice()?> €</p>             
            </div>

        <?php endforeach ?>
    </div> 

    

