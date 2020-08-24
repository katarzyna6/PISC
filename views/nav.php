
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
            <li><a href="index.php?route=category&id=<?= $cat->getIdCategory() ?>"><?= $cat->getName() ?></a>
                 <ul>
                    <?php foreach($cat->subCats as $subcat): ?>
                        <li><a href="index.php?route=subcategory&id=<?= $subcat->getIdSubcategory() ?>"><?= $subcat->getName() ?></a></li>
                    <?php endforeach ?>
                </ul>  
            </li>
        <?php endforeach ?>

        <li><a href="index.php?route=contact">Contact</a></li>
        <li><a href="index.php?route=termes">Termes et Conditions</a></li>
        <li><a href="index.php?route=admin">Espace admin</a></li>                 
    </ol>
    
</nav>

<h2>NOS MARQUES : </h2>

<div class="content">
    
    <div class="brands">
        <?php foreach($menu["brand"] as $brand): ?>
            <button><a href="index.php?route=brand&id=<?= $brand->getIdBrand() ?>"><?= $brand->getName() ?></a></button>
        <?php endforeach ?>
    </div>
    
</div>

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
</div>


 -->
