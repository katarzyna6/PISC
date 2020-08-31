<div class = "form_contact">
                    
        <form action="index.php?route=contact" method="POST">
            
        <h2>Contactez-moi</h2>
        
            <div class="field">
                <label for="name">Votre prenom</label><br>
                <input type="text" name="name" id="first"/>
            </div>

            <div class="field">
                <label for="name">Votre nom</label><br>
                <input type="text" name="name" id="name"/>
            </div>
        
            <div class="field">
                <label for="email">Votre adresse e-mail</label><br>
                <input type="text" name="email" id="email"/>
            </div>

            <div class="field">
                <label for="adresse">Votre adresse</label><br>
                <input type="text" name="adresse" id="adresse"/>
            </div>

            <div>
            <input type="text" name="cp" id="cp" placeholder="Code Postal">
                <select name="ville" id="ville">
                    <option disabled selected>Choisissez votre ville</option>
                </select>
            </div>

            <?php if(isset($_SESSION['liste'])): ?>
                <div>Les produits choisis :
                    <?php foreach($_SESSION['liste'] as $li): ?>
                        <label for="check-<?= $li ?>">Element n° <?= $li ?></label>
                        <input type="checkbox" name="check-<?= $li ?>" id="check-<?= $li ?>" checked>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        
            <div>
                <label for="message">Votre message</label><br>
                <textarea id="message" name="message" rows="4" cols="50"></textarea>
            </div>

            <button type="submit">Envoyer le message</button>
        
            <h3><a href="index.php">Retour</a><h3>

        </form>

<script src="js/contact.js"></script>