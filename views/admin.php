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

        <div><label for="description">Description</label><input type="text" name="description" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getDescription() : ""; ?>"/></div>

        <div><label for="prix">Prix</label><input type="text" name="prix" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getPrix() : ""; ?>"/></div>

        <div><label for="categorie">Catégorie :</label><br><br>

            <select id="cats" name="cats">
                <?php foreach ($view["datas"]["category"] as $category): ?>
                    <option value="<?=$category->getIdCategorie(); ?>"><?=$category->getName(); ?></option> 
                <?php endforeach ?>
            </select>
        </div>

        <div><label for="categorie">Souscatégorie :</label><br><br>
            <select id="subcats" name="subcats">
                <?php foreach ($view["datas"]["subcategory"] as $subcategory): ?>
                    <option value="<?=$subcategory->getIdSubcategorie(); ?>"><?=$subcategory->getName(); ?></option> 
                <?php endforeach ?>
            </select>
        </div>

        <div><label for="brand">Marque :</label><br><br>
            <select id="brand" name="brand">
                <?php foreach ($view["datas"]["brand"] as $brand): ?>
                    <option value="<?=$brand->getIdBrand(); ?>"><?=$brand->getName(); ?><?=$brand->getDescription(); ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div>
            <label for="image">Image</label><br><br><br>
            <input type="file" id="image" name="image"value="">
        </div>

        <div><label for="description">Description</label><input type="text" name="description" value="<?= isset($view['datas']['item'])? $view['datas']['book']->getDescription() : ""; ?>"/></div>
                
        <div><label for="opinion">Avis</label><input type="text" name="opinion" value="<?= isset($view['datas']['item'])? $view['datas']['book']->getOpinion() : ""; ?>"/></div>

        <div><label for="note">Ajouter une note</label><br><br><br><input type="radio" name="note" value=" <?= isset($view['datas']['item'])? $view['datas']['item']->getNote() : ""; ?>

                <?php for($i = 1; $i < 6; $i++) : ?>
                <?php 
                    if(isset($view['datas']['item']) && $i == $view['datas']['item']->getNote()) {
                        $selected = "checked";
                         
                    } else {
                    $selected = "";
                }
                
                ?>
                <label for="note"<?= $i ?>"><?= $i ?><input type="radio" id="<?= $i ?>" name="note" value="<?= $i ?>" <?= $selected ?> ></label>
                <?php endfor ?></div>

                <div><?= isset($view['datas']['item'])? "<input type='hidden' name='id_item' value=' ".$view['datas']['item']->getIdItem()."'>" : ""; ?></div>

                <div><input type="submit" value="<?= isset($view['datas']['item'])? "Modifier" : "Ajouter"; ?>" /></div>
        </form>
    </div>       

<div>
        <a href="insert_item">Ajouter un autre produit</a>
        <div><a href="index.html">Retour</a></div>
</div>

<?php
    require "views/footer.php";
?>