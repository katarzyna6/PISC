<div class="basket">
<p style = "color:#4f1b50">MA LISTE</p>
    <?php if(isset($_SESSION['liste'])): ?>
                <div>
                    <?php foreach($liste as $li): ?>
                        <input class="bsk" type="checkbox" name="check-<?= $li->getIdItem() ?>" id="check-<?= $li->getIdItem() ?>" checked>
                        <label style="font-size: small;" class="bsk" for="check-<?= $li->getIdItem() ?>"><?= $li->getName() ?></label>
                        
                    <?php endforeach ?>
                </div>
            <?php endif ?>
</div>