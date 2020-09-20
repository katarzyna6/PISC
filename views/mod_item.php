<div class = "form_mod">

    <form action="mod_item" method="POST" enctype="multipart/form-data">
            
        <h2>Modifier un produit</h2>

        <div class="field"><input type="text" name="name" placeholder="Nom" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getName() : ""; ?>"/></div>

        <div class="field">
            <select id="brand" name="brand">
                <option value="" disabled selected>-- Choisissez une marque --</option>
                    <?php foreach ($view["datas"]["brand"] as $brand): ?>
                        <option <?= $brand->getIdBrand() == $view['datas']['item']->getIdBrand()? "selected" : "";?>
                        value="<?=$brand->getIdBrand(); ?>"><?=$brand->getName(); ?></option>
                    <?php endforeach ?>
            </select>
        </div>

        <div class="field"><input type="text" name="description" placeholder="description" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getDescription() : ""; ?>"/></div>

        <div class="field"><input type="text" name="price" placeholder="prix" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getPrice() : ""; ?>"/></div>

        <!-- CATS -->
        <div class="field">

            <select id="category" name="category">
            <option value="" disabled selected>-- Choisissez une catégorie --</option>

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

        <div class="field">
            
            <select id="subcategory" name="subcategory">
            <option value="" disabled selected>-- Choisissez une sous-catégorie --</option>

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

        <div class="img_mod">
            <label for="image"></label>
<div class="img_mod2">
                <?php foreach ($view["datas"]["image"] as $image): ?>

                    <?php if($image->getIdItem() == $view['datas']['item']->getIdItem()) : ?>
                            <img src="img/<?=$image->getName(); ?>">
                            <a class="supp" href="del_image-<?= $image->getIdImage()?>"><img src="img/delete.png" alt="supprimer"/></a>
                    <?php endif ?>

                <?php endforeach ?> 
</div>
                <div class="field"><input type="file" name="image" id="image"  value="" multiple> </div>
        </div>
                
        <div class="field"><input type="text" name="avis" placeholder="avis" value="<?= isset($view['datas']['item'])? $view['datas']['item']->getAvis() : ""; ?>"/></div>

        <div id="avis_label">
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

                <div><button type="submit" value="<?= isset($view['datas']['item'])? "Modifier" : "Ajouter"; ?>">Modifier</button></div>
        </form>
    </div>       