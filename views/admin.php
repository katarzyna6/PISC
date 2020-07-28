<?php
//var_dump($view['datas']);
unset($_SESSION["admin"]);
?> 

<div class="espace">
    <h2>Mon espace</h2>
    <div><a href="deconnect.html">Me déconnecter</a></div>
</div>


<div class = "form_admin">
        
    <form action="<?= isset($view['datas']['item'])? "mod_item" : "insert_item"; ?>" method="POST" enctype="multipart/form-data">
            
        <h2><?= isset($view['datas']['item'])? "Modifier un produit" : "Ajouter un produit"; ?> </h2>

        <div><label for="name">Nom</label><input type="text" name="title" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getName() : ""; ?>"/></div>

        <div><label for="brand">Marque :</label><br><br>
            <select id="brand" name="brand">
                <?php foreach ($view["datas"]["brand"] as $brand): ?>
                    <option value="<?=$brand->getIdBrand(); ?>"><?=$brand->getName(); ?><?=$brand->getDescription(); ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div><label for="description">Description</label><input type="text" name="description" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getDescription() : ""; ?>"/></div>

        <div><label for="price">Prix</label><input type="text" name="price" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getPrice() : ""; ?>"/></div>

        <div><label for="category">Catégorie :</label><br><br>

        <select id="category" name="category">

        <?php foreach ($view["datas"]["category"] as $category): ?>
            <option value="<?=$cat->getIdCategory(); ?>"><?=$cat->getName(); ?></option>  
    
            <option value="Beauté">Beauté</option>
                <div><label for="subcategory">Sous-catégorie :</label><br><br>
                <select id="subcategory" name="subcategory">
                <?php foreach ($view["datas"]["subcategory"] as $subcategory): ?>
                    <option value="<?=$cat->getIdSubcategory(); ?>"><?=$cat->getName(); ?></option>
                <?php endforeach ?>

            <option value="Hygiène et Soins">Hygiène et Soins</option>
                <div><label for="subcategory">Sous-catégorie :</label><br><br>
                    <select id="subcategory" name="subcategory">
                    <?php foreach ($view["datas"]["subcategory"] as $subcategory): ?>
                        <option value="<?=$cat->getIdSubcategory(); ?>"><?=$cat->getName(); ?></option>
                    <?php endforeach ?>

            <option value="Special Femme">Special Femme</option>
                <div><label for="subcategory">Sous-catégorie :</label><br><br>
                    <select id="subcategory" name="subcategory">
                    <?php foreach ($view["datas"]["subcategories"] as $subcategory): ?>
                        <option value="<?=$cat->getIdSubcategory(); ?>"><?=$cat->getName(); ?></option>
                    <?php endforeach ?>
            <?php endforeach ?>
        </select>
</div>

        <div>
            <label for="image">Image</label><br><br><br>
            <input type="file" id="image" name="image"value="">
        </div>
                
        <div><label for="avis">Avis</label><input type="text" name="avis" value="<?= isset($view['datas']['item'])? $view['datas']['book']->getAvis() : ""; ?>"/></div>

        <div><label for="note">Ajouter une note</label><br><br><br><input type="radio" name="note" value=" <?= isset($view['datas']['item'])? $view['datas']['item']->getNote() : ""; ?>">

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

                <div><input type="submit" value="<?= isset($view['datas']['item'])? "Modifier" : "Ajouter"; ?>" /></div>
        </form>
    </div>       

<div>
        <a href="insert_item">Ajouter un autre produit</a>
        <div><a href="index.html">Retour</a></div>
</div>