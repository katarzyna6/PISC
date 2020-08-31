<?php
$item = $view['datas']['items']; 
$images = $view['datas']['images'];
?>

<div class="content_item">

<div class="produit">
    <div class="photo"> 
        <div class="overlay">

            <a href="index?route=item&id">
              <?php foreach($images as $image) : ?>
                     <?php if($item->getIdItem() == $image->getIdItem()) :?>
                            <img src="img/<?=$image->getName(); ?>">
                     <?php endif; ?>   
              <?php endforeach?>
            </a>
           

            <a class="link" href="index?route=item&id=<?= $item->getIdItem()?>"><p><?= $item->getName()?></p></a>

            <div class="item1"><p><?= $item->getDescription()?></p></div>

              <div class="item1"><p>Avis :<?= $item->getAvis()?></p></div>
              <div class="item1"><p>Note moyenne :<?= $item->getNote()?></p></div>

            <!-- <button class="myBtn" id="myBtn-<?= $item->getIdItem()?>">Voir le produit</button> -->

            <p>Prix : <?= $item->getPrice()?> €</p>

        </div>
    </div>               
</div>

<form>
<p>Notez le produit</p>

<div>
    <input type="radio" id="1"
           name="note" checked value="note">
    <label for="1">1</label>
    <input type="radio" id="2"
           name="note" value="2">
    <label for="2">2</label>
    <input type="radio" id="3"
           name="note" value="3">
    <label for="3">3</label>
    <input type="radio" id="4"
           name="note" value="4">
    <label for="4">4</label>
    <input type="radio" id="5"
           name="note" value="5">
    <label for="5">5</label><br><br>

    <label for="avis">Votre avis :</label><br>
    <textarea id="avis" name="avis" rows="4" cols="50"></textarea>
    
</div>

<div>
       <input type="checkbox" name="check" value="check">
       <label for="check">Ajouter le produit sur ma liste</label>
</div>

<div>
    <button type="submit">Envoyer</button>
</div>
  
</form>

</div>








