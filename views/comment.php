<div class = "form_comment">
                    
        <form action="index.php?route=comment" method="POST">

            <div>
                <label for="name">Votre prenom</label>
                <input type="text" name="name" id="first"/>
            </div>

            <div>
                <label for="name">Votre nom</label><br>
                <input type="text" name="name" id="name"/>
            </div>

            <div>
                <p>Votre note</p>
                <input type="radio" id="1" name="radio" value="1" checked>
                <label for="1">1</label>
                <input type="radio" id="2" name="radio" value="2">
                <label for="2">2</label>
                <input type="radio" id="3" name="radio" value="3">
                <label for="3">3</label>
                <input type="radio" id="4" name="radio" value="4">
                <label for="4">4</label>
                <input type="radio" id="5" name="radio" value="5">
                <label for="5">5</label>
            </div>

             <div>
                <label for="message">Votre avis :</label><br>
                <textarea id="message" name="message" rows="4" cols="50"></textarea>
            </div>
        
            <button type="submit">Envoyer le commentaire</button>
        
            <h3><a href="index.php">Retour</a><h3>