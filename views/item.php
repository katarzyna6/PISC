<?php

$datas = $view["datas"]["items"]->getName();

?>

<div class="content_item">

<?php foreach($view["datas"] as $data): ?>

<div class="produit">
    <div class="photo"> 
        <div class="overlay">

            <a href="index?route=item"><img src="<?= $data["image1"]?>" alt="image"></a>
            <a href="index?route=item"><img src="<?= $data["image2"]?>" alt="image"></a>
            <a href="index?route=item"><img src="<?= $data["image3"]?>" alt="image"></a>

            <a class="link" href="index?route=item&item=<?= $data["id_item"]?>"><p><?= $data["name"]?></p></a>

            <div class="item1"><p><?= $datas["description"]?></p></div>

              <div class="item1"><p>Avis :<?= $datas["avis"]?></p></div>
              <div class="item1"><p>Note moyenne :<?= $datas["note"]?></p></div>

            <button class="myBtn" id="myBtn-<?= $data["id_item"]?>">Voir le produit</button>

            <p>Prix : <?= $data["price"]?> €</p>

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

<?php endforeach ?>









