
<div id="basket">
    <p>MA LISTE</p>
    <table id="panier">
    <?php if(isset($_SESSION['liste'])): ?>
        <?php foreach($liste as $li): ?>
        <tr>
            <td><input class="bsk" type="checkbox" name="check-<?= $li->getIdItem() ?>" id="check-<?= $li->getIdItem() ?>" checked></td>
            <td><label style="font-size: small;" class="bsk" for="check-<?= $li->getIdItem() ?>"><?= $li->getName() ?></label></td>
        </tr>
        <?php endforeach ?>
    <?php endif ?>
            </table>
</div>