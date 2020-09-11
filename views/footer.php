<div class="footer">
        <div><p>Tous droits réservés à la société de magasinage en ligne Cotton Pearl.</p></div>
    
        <div class="liens">
            <ul>
                <?php foreach($footer['links'] as $link): ?>
                    <li><a href="<?= $link->getUrl() ?>"><?= $link->getName() ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>

</div>