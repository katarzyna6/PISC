<div id="basket">
    <p>MA LISTE</p>
    <form action="modListe" method="POST">
        <table id="panier">
            <?php if(isset($_SESSION['liste'])): ?>
                <?php foreach($liste as $li): ?>
                <tr>
                    <td><input class="bsk" type="checkbox" name="<?= $li->getIdItem() ?>" id="check-<?= $li->getIdItem() ?>" checked></td>
                    <td><label style="font-size: small;" class="bsk" for="check-<?= $li->getIdItem() ?>"><?= $li->getName() ?></label></td>
                </tr>
                <?php endforeach ?>
                <?php else: ?>
                <p>Vous n'avez pas d'articles à afficher !</p>
            <?php endif ?>
        </table>
        <hr>
        <input type="hidden" name="redir" value="<?= $_REQUEST['route']?? "home"?>">
        <?php if (isset($_REQUEST['id'])): ?>
            <input type="hidden" name="id" value="<?= $_REQUEST['id']?>">
        <?php endif ?>
        <button type="submit">Mettre à jour</button>
    </form>
</div>