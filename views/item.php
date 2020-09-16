<?php
$item = $view['datas']['item']; 
?>

<div class="content_item">
<h3><?= $item->getName()?></h3>

       <div class="prod">
       
              <div class="info">
                     <div class="item1"><p><b><?= $item->getDescription()?></b></p></div>

                     <div class="item1"><p><b>Avis : </b><?= $item->getAvis()?></p></div>

                     <div class="item1"><p><b>Note moyenne : </b><?= $item->getNote()?></p></div>

                     <p><b>Prix : </b><?= $item->getPrice()?> €</p> 
              </div>

              <div class="photos"> 
                     <?php if(!empty($item->images)): ?>
                            <!-- <div id="img_default">
                                   <img src="img/<?=$item->images[0]->getName(); ?>">
                            </div> -->

                            <div class="img_selection">
                            <?php foreach($item->images as $image):?>
                                   <div class="img_vignette">
                                          <img src="img/<?=$image->getName(); ?>">
                                   </div>
                            <?php endforeach ?>
              </div>

                     <?php endif ?>
                       
                            
                     <div class="item_button">
                            <button class="liste1"><a href="addListe-<?= $item->getIdItem()?>">Ajouter le produit sur ma liste</a></button>
                     </div>
                     <div class="item_button">
                            <button class="myBtn" id="myBtn-<?= $item->getIdItem()?>">Voir le produit</button>
                     </div>

                            
       </div>
</div>



<div class="note">
       <form>
              <p>Notez le produit</p>

              <div class="radio">
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
                     <label for="5">5</label>
              </div>

              <label for="avis">Votre avis : </label>
              <textarea id="avis" name="avis" rows="4" cols="50"></textarea>
              
       
              <div class="env">
              <button  type="submit">Envoyer</button>
              </div>
  
       </form>

</div>


<!-- The Modal -->
<div id="modal-<?= $item->getIdItem()?>" class="modal">

       <!-- Modal content -->
       <div class="modal-content">
              <div class="modal-header">
                     <span class="close" id="close-<?= $item->getIdItem()?>">&times;</span>
                     <h2><?= $item->getName()?></h2>
              </div>
              <div class="modal-body">
                     <p><?= $item->getDescription()?></p>
              </div>
              <div>
              <?php foreach($images as $image) : ?>
                     <?php if($item->getIdItem() == $image->getIdItem()) :?>
                            <img src="img/<?=$image->getName(); ?>">
                     <?php endif; ?>   
              <?php endforeach?>
              </div>
              <div class="modal-footer">
                     <h3>Prix : <?= $item->getPrice()?> €</h3>
              </div>
       </div>

</div>
<script>

document.addEventListener("DOMContentLoaded", function(event) { 
       $('.img_selection').slick(
  );
});
</script>