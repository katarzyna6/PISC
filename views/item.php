<?php
$item = $view['datas']['item']; 
?>

<div class="content_item">
<h2><?= $item->getName()?></h2>

       <div class="prod">
       
              <div class="info">
                     <div class="item1"><p><b>Description : </b><?= $item->getDescription()?></p></div>

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
                                          <div class="img_vignette"><img src="img/<?=$image->getName(); ?>"></div>
                                   <?php endforeach ?>
                            </div>

                     <?php endif ?>
                       
                            
                     <div class="item_button">
                            <button class="liste1"><a href="addListe-<?= $item->getIdItem()?>">Ajouter le produit sur ma liste</a></button>
                     </div>
                     

              </div>
       </div>
</div>


       <div class="note">
              <form class="note_form">
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

                     <div>
                            <label for="message"></label>
                            <textarea id="avis" name="avis" rows="4" cols="25" placeholder="Votre avis"></textarea>
                     </div>
              
       
                     <div class="env">
                            <button  type="submit">Envoyer</button>
                     </div>
  
              </form>
       </div>

<script>

document.addEventListener("DOMContentLoaded", function(event) { 
       $('.img_selection').slick( {
              prevArrow: '<button type="button" class="slick-prev"></button>',
              nextArrow: '<button type="button" class="slick-next"></button>'
       }
              
  );
});
</script>