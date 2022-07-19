<?php

include_once '../../assets/include/adminHeader.php';

?>

<?php

$user = new User();
$db = DB::getDB();
if (!$user->isLoggendIn()) {
    Go::to('../../');
}
?>
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Emri :</th>
            <th>Email:</th>
            <th>Subject:</th>
            <th>Message:</th>
        </tr>

        <form method="POST" action="#"
              onsubmit="confirm('A jeni i sigurt qe do ta fshini Kategorin! ')">
            <?php if ($db->sql("SELECT * FROM contacts")->results()) : ?>
                <?php foreach ($db->sql("SELECT * FROM contacts")->results() as $c) : ?>
                    <tr>
                        <td><?= $c->name ?></td>
                        <td><?= $c->email ?></td>
                        <td><?= $c->subject ?></td>
                        <td><textarea><?= $c->message ?></textarea></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2" style="text-align: center">Nuk ka asnje kategori</td>
                </tr>
            <?php endif; ?>

        </form>

    </table>
</div>

<?php
include_once '../../assets/include/adminFooter.php';
?>
