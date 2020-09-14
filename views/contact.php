<?php
$liste = $view['datas']['liste'];
?>

<div class = "form_contact">
                    
    <form action="index.php?route=contact" method="POST">
            
    <h2>Contactez-moi</h2>
        
        <div class="field">
            <label for="name"></label>
            <input type="text" name="name" id="first" placeholder="Votre prenom"/>
        </div>

        <div class="field">
            <label for="name"></label>
            <input type="text" name="name" id="second" placeholder="Votre nom"/>
        </div>
        
        <div class="field">
            <label for="email"></label>
            <input type="text" name="email" id="email" placeholder="Votre adresse e-mail"/>
        </div>

        <div class="field">
            <label for="adresse"></label>
            <input type="text" name="adresse" id="adresse" placeholder="Votre adresse"/>
        </div>

        <div class="cp_input">
            <input type="text" name="cp" id="cp" placeholder="Code Postal">
                
            <select name="ville" id="ville">
                <option disabled selected>Choisissez votre ville</option>
            </select>
        </div>

        <div class="liste_contact">
            <?php if(isset($_SESSION['liste'])): ?>
                <div>Les produits choisis :
                    <?php foreach($liste as $li): ?>
                        <li>
                            <input type="checkbox" name="check-<?= $li->getIdItem() ?>" id="check-<?= $li->getIdItem() ?>" checked>
                            <label for="check-<?= $li->getIdItem() ?>"><?= $li->getName() ?></label>
                        </li>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>

        <div>
            <label for="message"></label>
            <textarea id="message" name="message" rows="4" cols="25" placeholder="Votre message"></textarea>
        </div>

        <div class="cont">
            <button type="submit">Envoyer le message</button>
        </div>
        
            <h3><a href="index.php">Retour</a><h3>

    </form>
    
</div>

<script src="js/contact.js"></script>