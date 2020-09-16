<div class = "form_signUp">
                
        <form action="insert_admin" method="POST">
        <h2>Inscrivez-vous tant que Administrateur</h2>
        
        
            <div class="field">
                <label for="nick" class="field-label">Nick</label>
                <input type="text" name="nick" class="field-input">
            </div>

            <div class="field">
                <label for="email" class="field-label">E-mail</label>
                <input type="text" name="email" class="field-input">
            </div>
                    
            <div class="field">
                <label for="password" class="field-label">Mot de passe</label>
                <input type="password" name="password" class="field-input">
            </div>
        
            <div class="field">
                <label for="password2" class="field-label">Répétez le mot de passe</label>
                <input type="password" name="password2" class="field-input">

            </div>
                <button type="submit">Créer un compte</button> 
                <h3><a href="index.php">Retour</a><h3>
            </div>
    
        </form>
    </div>


<div class = "form_connect">
                    
        <form action="connect" method="POST">
            
        <h2>Connectez-vous</h2>
        
            <div class="field">
                <label for="nick">Nick</label><br>
                <input type="text" name="nick"/>
            </div>
        
            <div class="field">
                <label for="password">Mot de passe</label><br>
                <input type="password" name="password"/>
            </div>
        
            <h3><a href="#">Mot de passe oublié?</a></h3>
        
            <button type="submit">Connectez-vous</button>
        
            <h3><a href="index.php">Retour</a><h3>

        </form>