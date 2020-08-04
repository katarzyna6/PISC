<?php

$datas = $view["datas"];

?>

<div class="content_item">

    <div class="info">
        <h1><?= $datas["brand"]?></h1>
        <div class="item1"><h2><?= $datas["name"]?><h2></div>
        <div class="item1"><p><?= $datas["description"]?></p></div>
        <div class="item1"><p>Avis :<?= $datas["avis"]?></p></div>
        <div class="item1"><p>Note moyenne :<?= $datas["note"]?></p></div>
        <div><p>Prix :<?= $datas["prix"]?></p></div>
    </div>
    
    
    <div class="item">
        <div class="item1_photo1"><img src="<?= $datas["image1"]?>" width="175" height="150" alt="dilex"></div>
        <div class="item1_photo"><img src="<?= $datas["image2"]?>" width="175" height="150" alt="dilex"></div>
        <div class="item1_photo"><img src="<?= $datas["image3"]?>" width="175" height="150" alt="dilex"></div>
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
    <button type="submit">Envoyer</button>
  </div>
  
</form>

</div>








