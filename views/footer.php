<div class="footer">
    <div><p>Tous droits réservés à la société de magasinage en ligne Cotton Pearl.</p></div>
    
    <div class="liens">
    <ul>
		<?php foreach($footer ['links'] as $link ): ?>
			<li><a href="<?= $link->getIdLink() ?>"><?= $link->getUrl() ?><?= $link->getName() ?></a></li>
		<?php endforeach ?>
	</ul>
    
        <!-- <div><a href="index?route=home">Accueil</a></div>
        <div><a href="index?route=politique">Politique de confidentialité</a></div>
        <div><a href="index?route=cgv">CGV</a></div>
        <div><a href="index?route=contact">Contact</a></div>
        <div><a href="index?route=liens">Liens</a></div>
        <div><a href="https://www.facebook.com/piscofficial/" target="_blank" title="Facebook"><i class="icon-facebook"></i></a></div>
        <div><a href="https://www.instagram.com/piscofficial/" target="_blank" title="Instagram"><i class="icon-instagram"></i></a></div> -->
    </div>
</div>