<?php
$subcat = $view['datas']['subcategory']; 
$items = $view['datas']['subcat_items'];

// var_dump($items);
// var_dump($images);
?>
<h1><?= $subcat->getName() ?></h1>
    <div class="container">

        <?php foreach($items as $item): ?>

            <div class="produit">
                <div class="photo"> 
                    <div class="overlay">

                        <a href="item">
                            <?php if(!empty($item->images)): ?>
                            <div class="image_accueil"><img src="img/<?=$item->images[0]->getName(); ?>"></div>
                            <?php endif ?>
                        </a>

                        <a class="link" href="item-<?= $item->getIdItem()?>"><p><?= $item->getName()?></p></a>
                        <p class="description_item"><?= htmlspecialchars($item->getName())?></p>
                        <button class="myBtn" id="myBtn-<?= $item->getIdItem()?>">Voir le produit</button>

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


                        <p>Prix : <?= $item->getPrice()?> €</p>

                    </div>
                </div>   
            </div>

        <?php endforeach ?>
    </div> 

    

