<div class = "form_signUp">
                
        <form action="insert_admin" method="POST">
        <h2>Inscrivez-vous en tant que Administrateur</h2>
        
        
            <div class="field">
                <input type="text" name="nick" class="field-input" placeholder="Nick">
            </div>

            <div class="field">
                <input type="text" name="email" class="field-input" placeholder="E-mail">
            </div>
                    
            <div class="field">
                <input type="password" name="password" class="field-input" placeholder="Mot de passe">
            </div>
        
            <div class="field">
                <input type="password" name="password2" class="field-input" placeholder="Répétez le mot de passe">
            </div>

            <div class="signUp">
                <button type="submit">Créer un compte</button> 
            </div>

            <h3><a href="index.php">Retour</a><h3>
    
        </form>
</div>


<div class = "form_connect">
                    
        <form action="connect" method="POST">
            
        <h2>Connectez-vous</h2>
        
            <div class="field">
                <input type="text" name="nick" placeholder="Nick"/>
            </div>
        
            <div class="field">
                <input type="password" name="password" placeholder="Mot de passe"/>
            </div>
        
            <div class="form_connect_btn"><button type="submit">Connectez-vous</button></div>
        
            <h3><a href="index.php">Retour</a><h3>
            <h3><a href="#">Mot de passe oublié?</a></h3>

        </form>