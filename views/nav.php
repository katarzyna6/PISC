
<header>
    <div class="wrapper">  
        <div class="logo">
            <div><img src="img\logo.png"/></div>
        <div class="title"> <p>Produits cosmétiques</p></div>
    </div>
    <div style="clear: both;"></div>          
</header>

<nav class="sticky">
    <ol>
        <li><a href="index?route=home">Accueil</a></li>

        <?php foreach($menu["categories"] as $cat): ?>
            <li><a href="#"><?= $cat->getName() ?></a>
                <ul>
                    <?php foreach($cat->subCats as $subcat): ?>
                        <li><a href="#"><?= $subcat->getName() ?></a></li>
                    <?php endforeach ?>
                </ul>
            </li>
        <?php endforeach ?>

        <!-- <li><a href="#">Beauté</a>
            <ul>
                <li><a href="#">Beauté du Visage</a></li>
                <li><a href="#">Beauté des cheveux</a></li>
                <li><a href="#">Beauté des yeux et sourcils</a></li>
                <li><a href="#">Beauté du corps</a></li>
            </ul>
        </li>

        <li><a href="#">Hygiène et Soins</a>
            <ul>
                <li><a href="#">Soins des mains et du visage</a></li>
                <li><a href="#">Soins des cheveux</a></li>
                <li><a href="#">Soins bucco-dentaires</a></li>
                <li><a href="#">Soins du corps</a></li>
                <li><a href="#">Coton-tige</a></li>
                <li><a href="#">Lingettes</a></li>
            </ul>
                    
        </li>

        <li><a href="#">Spécial Femme</a>
            <ul>
                <li><a href="#">Protection hygiènique</a></li>       
            </ul>

        </li> -->

        <li><a href="index.php?route=contact">Contact</a></li>
        <li><a href="index.php?route=admin">Espace admin</a></li>
                        
    </ol>
    
</nav>

<!-- <div class="form_nav">
        <form class="nav2">
            <input type="search" id="maRecherche" name="q"
            placeholder="Rechercher un produit">
            <button class="button_nav">Rechercher</button>
        </form>

        <form class="nav2" name="brand">
            <select class="liste" name="option">
                <option value="#" disabled selected>Trier par une marque</option>
                <option value="dilex">DILEX</option>
                <option value="ellix">ELLIX</option>
                <option value="ldora">L'DORA</option>
                <option value="nurixo">NURIXO</option>
                <option value="w&b">W & B</option>
            </select>
        </form>

        <form class="nav2" name="type">
            <select class="liste" name="option">
                <option value="#" disabled selected>Trier par un type</option>
                <option value="tri">Beauté du visage</option>
                <option value="tri">Beauté des cheveux</option>
                <option value="tri">Beauté des yeux et sourcils</option>
                <option value="tri">Beauté du corps</option>
                <option value="tri">Soins des mains et du visage</option>
                <option value="tri">Soins des cheveux</option>
                <option value="tri">Soins bucco-dentaires</option>
                <option value="tri">Soins du corps</option>
                <option value="tri">Coton-tiges</option>
                <option value="tri">Lingettes</option>
                <option value="tri">Protection hygiènique</option>
            </select>
        </form>
</div> -->



