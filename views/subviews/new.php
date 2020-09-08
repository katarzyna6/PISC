<?php
$n_items = $view['datas']['new_items'];
?>

<div class="selection">
    <div class="container">

        <?php foreach($n_items as $item): ?>

            <div class="produit">
                <div class="photo"> 
                    <div class="overlay">

                        <a href="index?route=item">
                            <?php if(isset($item->images[0])) : ?>
                                <img src="img/<?=$item->images[0]->getName(); ?>">
                            <?php endif?>
                        </a>

                        <a class="link" href="index?route=item&id=<?= $item->getIdItem()?>"><p><?= $item->getName()?></p></a>

                        <button class="myBtn" id="myBtn-<?= $item->getIdItem()?>">Voir le produit</button>

                        <!-- The Modal -->
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
</div>
    

