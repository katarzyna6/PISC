<?php
$items = $view['datas']['items'];
$image = $view['datas']["images"];

// var_dump($items);
// var_dump($view['datas']["images"]);
?>
<div class="monEspace">
<h2>Mon espace</h2>
    <div class="espace">
        <button><a href="deconnect">Me déconnecter</a></button>
    </div>


<div class = "form_admin">
        
    <form action="<?= isset($view['datas']['item'])? "mod_item" : "insert_item"; ?>" method="POST" enctype="multipart/form-data">
            
        <h2><?= isset($view['datas']['item'])? "Modifier un produit" : "Ajouter un produit"; ?> </h2>

        <div class="field">
            <label for="name">Nom</label><input type="text" name="name" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getName() : ""; ?>"/>
        </div>

        <div class="select">
            <select id="brand" name="brand">
                <option value="" disabled selected>-- Choisissez une marque --</option>
                <?php foreach ($view["datas"]["brand"] as $brand): ?>
                    <option value="<?= htmlspecialchars($brand->getIdBrand()); ?>"><?= htmlspecialchars($brand->getName()); ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div><label for="description">Description</label><input type="text" name="description" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getDescription() : ""; ?>"/></div>

        <div><label for="price">Prix</label><input type="text" name="price" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getPrice() : ""; ?>"/></div>

        <div class="select">
            <select id="category" name="category">
                <option value="" disabled selected>-- Choisissez une catégorie --</option>
                <?php foreach ($view["datas"]["category"] as $cat): ?>
                    <option value="<?= htmlspecialchars($cat->getIdCategory()); ?>"><?= htmlspecialchars($cat->getName()); ?></option>  
                <?php endforeach ?>

            </select>
        </div>

        <div class="select">
            <select id="subcategory" name="subcategory">
                <option value="" disabled selected>-- Choisissez une sous-catégorie --</option>
                <?php foreach ($view["datas"]["subcategory"] as $subcat): ?>
                    <option value="<?= htmlspecialchars($subcat->getIdSubcategory()); ?>"><?= htmlspecialchars($subcat->getName()); ?></option>
                <?php endforeach ?> 
            </select>
        </div>

        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image"  value="" multiple>
        </div>
                
        <div><label for="avis">Avis</label><input type="text" name="avis" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getAvis() : ""; ?>"/></div>

        <div>
            <label for="note">Ajouter une note</label><br>
            <input type="radio" name="note" value=" <?= isset($view['datas']['item'])? $view['datas']['item']->getNote() : ""; ?>">

                <?php for($i = 1; $i < 6; $i++) : ?>
                <?php 
                    if(isset($view['datas']['item']) && $i == $view['datas']['item']->getNote()) {
                        $selected = "checked";
                         
                    } else {
                    $selected = "";
                }
                
                ?>
                <label for="note<?= $i ?>"><?= $i ?><input type="radio" id="<?= $i ?>" name="note" value="<?= $i ?>" <?= $selected ?> ></label>
                <?php endfor ?></div>

                <div><?= isset($view['datas']['item'])? "<input type='hidden' name='id_item' value=' ".$view['datas']['item']->getIdItem()."'>" : ""; ?></div>

                <div><button type="submit" value="<?= isset($view['datas']['item'])? "Modifier" : "Ajouter"; ?>">Ajouter</button></div>
        </form>
    </div>    
    
    <h2>Mes produits ajoutés :</h2>
<div class="articles">
<ul class="articles_list">
    <?php
    foreach($items as $item) :?>
    
<p><b>
        <li><p><b>Nom :</b></p> <a href="mod_item-<?= htmlspecialchars($item->getIdItem())?>"><?= htmlspecialchars($item->getName());?></a></li>
        <li><p><b>Description :</b></p></b></p> <?= htmlspecialchars($item->getDescription())?></li>
        <li><p><b>Marque :</b></p> <?= htmlspecialchars($item->brandcomplete->getName())?></li>
        <li><p><b>Catégorie :</b></p> <?= htmlspecialchars($item->categorycomplete->getName());?></li>
        <li><p><b>Sous-Catégorie :</b></p> <?= htmlspecialchars($item->subcategorycomplete->getName())?></li>
        <li><p><b>Prix :</b></p> <?= htmlspecialchars($item->getPrice())?></li>
        <li><p><b>Note :</b></p> <?= htmlspecialchars($item->getNote())?></li>
        <li><p><b>Avis :</b></p> <?= htmlspecialchars($item->getAvis())?></li>
        <p><b>Images : </b></p>
        <li class="liste_img">
                <div class="img-list"> 
                        <?php foreach($view["datas"]["images"] as $image) : ?>
                            <?php if($item->getIdItem() == $image->getIdItem()) :?>
                                <img src="img/<?= htmlspecialchars($image->getName()); ?>">
                            <?php endif; ?>   
                        <?php endforeach?>

                </div>
        </li>
        <li><button><a href="mod_item-<?= htmlspecialchars($item->getIdItem())?>">Modifier</a></button></li>
        <li><button><a href="del_item-<?= htmlspecialchars($item->getIdItem())?>">Supprimer</a></button><li>
                    
        <?php endforeach ?>
    
</ul>
</div>

<div>
        <a href="index.php?route=insert_item">Ajouter un autre produit</a>
        <div><a href="index.php">Retour</a></div>
</div>

</div>