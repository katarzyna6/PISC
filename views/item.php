<?php

$donnees = $view["datas"];

?>


<h1><?= $donnees["brand"]?></h1>
<div class="name"><h2><?= $donnees["name"]?><h2></div>
<div class="product">
    <div class="item1">
        <img src="<?= $donnees["image1"]?>" width="175" height="150" alt="dilex">
    </div>

    <div class="item1">
        <img src="<?= $donnees["image2"]?>" width="175" height="150" alt="dilex">
    </div>

    <div class="item1">
        <img src="<?= $donnees["image3"]?>" width="175" height="150" alt="dilex">
    </div>

<div class="description"><p><?= $donnees["description"]?></p></div>

<div class="avis">
    <p><?= $donnees["avis"]?></p>
</div>

<div class="note">
    <p><?= $donnees["note"]?></p>
</div>

<div class="prix">
    <p><?= $donnees["prix"]?></p>
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












