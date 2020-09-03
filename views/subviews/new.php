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

                        <p>Prix : <?= $item->getPrice()?> €</p>

                    </div>
                </div>               
            </div>
            
        <?php endforeach ?>
    </div>
  
</div>
    

