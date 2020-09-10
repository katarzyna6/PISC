<?php
$items = $view['datas']['brand_items'];

var_dump($items);
var_dump($brand);
?>
<h1><?= $brand->getName() ?></h1>
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

                        <button class="myBtn" id="myBtn-<?= $item->getIdItem()?>">Voir le produit</button>

                        <div id="modal-<?= $item->getIdItem()?>" class="modal">

                            <div class="modal-header">
                                <span class="close" id="close-<?= $item->getIdItem()?>">&times;</span>
                                <h2><?= $item->getName()?></h2>
                            </div>
                            

                            <div class="modal-body">
                                <p><?= $item->getDescription()?></p>
                            
                                <?php foreach($item->images as $image) : ?>
                                    <img src="img/<?=$image->getName(); ?>">
                                <?php endforeach?>
                            </div>

                            <div class="modal-footer">
                                <h3>Prix : <?= $item->getPrice()?> €</h3>
                            </div>
                        </div> 

                        <p>Prix : <?= $item->getPrice()?> €</p>

                    </div>
                </div>               
            </div>

        <?php endforeach ?>
  
    </div>

    

