<div class = "form_admin">

    <form action="index.php?route=mod_item" method="POST" enctype="multipart/form-data">
            
        <h2>Modifier un produit</h2>

        <div><label for="name">Nom</label><input type="text" name="name" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getName() : ""; ?>"/></div>

        <div>
    
            <label for="brand">Marque :</label><br>
            <select id="brand" name="brand">
                <?php foreach ($view["datas"]["brand"] as $brand): ?>
                    
                    <option <?= $brand->getIdBrand() == $view['datas']['item']->getIdBrand()? "selected" : "";?>
                    value="<?=$brand->getIdBrand(); ?>"><?=$brand->getName(); ?></option>
                    
                <?php endforeach ?>
            </select>
        </div>

        <div><label for="description">Description</label><input type="text" name="description" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getDescription() : ""; ?>"/></div>

        <div><label for="price">Prix</label><input type="text" name="price" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getPrice() : ""; ?>"/></div>

        <!-- CATS -->
        <div>
            <label for="category">Catégorie :</label><br>
            <select id="category" name="category">

                <?php foreach ($view["datas"]["category"] as $cat): ?>
                    <?php 
                    if($cat->getIdCategory() == $view['datas']['item']->getIdCategory()) {
                        $selected = "selected";
                         
                    } else {
                    $selected = "";
                }
                
                ?>
                    <option <?=$selected?> value="<?=$cat->getIdCategory(); ?>"><?=$cat->getName(); ?></option>  
                <?php endforeach ?>

            </select>
        </div>

        <div>
            <label for="subcategory">Sous-catégorie :</label><br>
            <select id="subcategory" name="subcategory">
                <?php foreach ($view["datas"]["subcategory"] as $subcat): ?>
                    <?php 
                    if($subcat->getIdSubcategory() == $view['datas']['item']->getIdSubcategory()) {
                        $selected = "selected";
                         
                    } else {
                    $selected = "";
                }?>
                    <option <?=$selected?> value="<?=$subcat->getIdSubcategory(); ?>"><?=$subcat->getName(); ?></option>
                <?php endforeach ?> 
            </select>
        </div>

        <div>
            <label for="image">Image</label>
            <input type="file" id="image" name="image"value="">
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

                <div><input type="submit" value="<?= isset($view['datas']['item'])? "Modifier" : "Ajouter"; ?>" /></div>
        </form>
    </div>       