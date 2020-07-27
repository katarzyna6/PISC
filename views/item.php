<?php

$donnees = [
    
    "name" => "Lingettes hydratantes",
    "image1" => "img/DILEX/1.jpg",
    "image2" => "img/DILEX/1_2.jpg",
    "image3" => "img/DILEX/1_3.jpg",
    "description" => "<p>Les lingettes nettoyantes et désinfectantes avec huile d'argan, huile d'amande, vitamine E, sans paraben. Appropriés lorsqu'il n'y a pas de conditions de toilette, idéales pour les soins des malades et des personnes âgées. Produit convient pour une utilisation quotidienne, ne dessèche pas la peau.</p>",
    "prix" => 15,
    "avis" => "<p>OK</p>",
    "note" => 3
];

?>


<h1>DILEX</h1>
<?php foreach($donnees as $donnee): ?>
<div class="name"><h2><?= $donnee[$nom]?><h2></div>
<div class="product">
    <div class="item1">
        <img src="<?= $donnee["image1"]?>" width="175" height="150" alt="dilex">
    </div>

    <div class="item1">
        <img src="<?= $donnee["image2"]?>" width="175" height="150" alt="dilex">
    </div>

    <div class="item1">
        <img src="<?= $donnee["image3"]?>" width="175" height="150" alt="dilex">
    </div>

<div class="description"><p><?= $donnee["description"]?></p></div>

<div class="avis">
    <p><?= $donnee["avis"]?></p>
</div>

<div class="note">
    <p><?= $donnee["note"]?></p>
</div>

<div class="prix">
    <p><?= $donnee["prix"]?></p>
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

<?php endforeach ?>











