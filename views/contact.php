<?php
$liste = $view['datas']['liste'];
?>
            
<form class = "form_contact" action="contact" method="POST">
        
    <h2>Contactez-moi</h2>
    
    <div class="field">
        <input type="text" name="name" id="first" placeholder="Votre prenom"/>
    </div>

    <div class="field">
        <input type="text" name="name" id="second" placeholder="Votre nom"/>
    </div>

    <div class="field">
        <input type="text" name="email" id="email" placeholder="Votre adresse e-mail"/>
    </div>

    <div class="field">
        <input type="text" name="adresse" id="adresse" placeholder="Votre adresse"/>
    </div>

    <div class="cp_input">
        <div class="field">
            <input type="text" name="cp" id="cp" placeholder="Code Postal">
        </div>
        
        <div class="field">
            <select name="ville" id="ville">
                <option disabled selected>Choisissez votre ville</option>
            </select>
        </div>
    </div>

        <div class="liste_contact">
            <?php if(isset($_SESSION['liste'])): ?>
                <div><b>Les produits choisis : </b>
                    <?php foreach($liste as $li): ?>
                        <ul>
                            <li>
                                <input type="checkbox" name="check-<?= $li->getIdItem() ?>" id="check-<?= $li->getIdItem() ?>" checked>
                                <label for="check-<?= $li->getIdItem() ?>"><?= $li->getName() ?></label>
                            </li>
                        </ul>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>

        <div>
            <label for="message"></label>
            <textarea id="message" name="message" rows="4" cols="25" placeholder="Votre message"></textarea>
        </div>

        <div class="g-recaptcha" data-sitekey="6LcrEM0ZAAAAAPJHGqthmKXmi5LuAsvj8fhnJYEd"></div>
        <?php 
        if (isset($_POST['submit'])) {
            $secret = '6Le88MwZAAAAAAOzQfLVecRBIUXkbIv51Uf_PZEi';
            $response = $_POST['g-recaptcha-response'];
            $remoteip = $_SERVER['REMOTE_ADDR'];
            
            $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
            $result = json_decode($url, TRUE);
                if ($result['success'] == 1) {
                echo 'ok';
                }else{
                echo 'error reCAPTCHA';
            }
        }
?>

        <div class="cont">
            <button type="submit">Envoyer le message</button>
        </div>
        
            <h3 id="retour"><a href="index.php">Retour</a><h3>

    </form>
    


<script src="js/contact.js"></script>