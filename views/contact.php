<div class = "form_contact">
                    
        <form action="index.php?route=contact" method="POST">
            
        <h2>Contactez-moi</h2>
        
            <div class="field">
                <label for="name">Votre nom</label><br>
                <input type="text" name="name"/>
            </div>
        
            <div class="field">
                <label for="email">Votre adresse e-mail</label><br>
                <input type="email" name="email"/>
            </div>

            <div>
                <div>Les produits choisis : <br>...............</div>
                <label for="message">Votre message</label><br>
                <textarea id="message" name="message" rows="4" cols="50"></textarea>
            </div>
        
            <button type="submit">Envoyer le message</button>
        
            <h3><a href="index.php">Retour</a><h3>

        </form>
        
        <div id="modeContent"></div>