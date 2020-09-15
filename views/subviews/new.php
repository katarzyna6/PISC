<?php
$n_items = $view['datas']['new_items'];
?>

<div class="selection">
    <div class="container">

        <?php foreach($n_items as $item): ?>

            <div class="produit">
                <div class="photo"> 
                    <div class="overlay">

                        <a href="item">
                            <?php if(isset($item->images[0])) : ?>
                                <img src="img/<?=$item->images[0]->getName(); ?>">
                            <?php endif?>
                        </a>

                        <a class="link" href="index?route=item&id=<?= htmlspecialchars($item->getIdItem())?>"><p><?= htmlspecialchars($item->getName())?></p></a>

                        <a href="item-<?= htmlspecialchars($item->getIdItem())?>"><p><?= htmlspecialchars($item->getName())?></p></a>
                        <button class="myBtn" id="myBtn-<?= htmlspecialchars($item->getIdItem())?>">Voir le produit</button>

                        <!-- The Modal -->
                        
                        <div id="modal-<?= htmlspecialchars($item->getIdItem())?>" class="modal">

                            <div class="modal-header">
                                <span class="close" id="close-<?= htmlspecialchars($item->getIdItem())?>">&times;</span>
                                <h2><?= htmlspecialchars($item->getName())?></h2>
                            </div>
                            

                            <div class="modal-body">
                                <p><?= htmlspecialchars($item->getDescription())?></p>
                            
                                <?php foreach($item->images as $image) : ?>
                                    <img src="img/<?=$image->getName(); ?>">
                                <?php endforeach?>
                            </div>

                            <div class="modal-footer">
                                <h3>Prix : <?= htmlspecialchars($item->getPrice())?> €</h3>
                            </div>
                        </div> 

                        <p>Prix : <?= htmlspecialchars($item->getPrice())?> €</p>

                    </div>
                </div>               
            </div>
            
        <?php endforeach ?>
    </div>
</div>
    

