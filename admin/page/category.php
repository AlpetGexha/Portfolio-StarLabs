<?php

include_once '../../assets/include/adminHeader.php';

?>

<?php

use Controller\CategoryController as Category;

$user = new User();
if (!$user->isLoggendIn()) {
    Go::to('../../');
}

$category = new Category();

$file = new File();

if (isset($_POST['token'])) {
    $f = $_FILES['photo'];

    $file->set($f);
    $file->name('photo');
    $file->max_size(3);
    $file->direcotry('assets/img/category');
    $file->upload();

    $category->create([
        'title' => Input::get('title'),
        'slug' => slug(Input::get('title')),
        'image' => $file->file_name,
    ]);
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <?php getErrors() ?>
    <?= csrf() ?>
    <div class="input-field mb-3" style="margin-top: 25px;">
        <label for="title">Title: </label>
        <input
                type="text"
                class="input-form"
                name="title"
                autocomplete
                required
                value="<?= e(Input::get('title')) ?>"
                oninvalid="this.setCustomValidity('Ju lutem shkruani Kategorin');"
                oninput="this.setCustomValidity('')" ;
        >
    </div>

    <div class="input-field mb-3" style="margin-top: 25px;">
        <label for="Photo">Foto: </label>
        <input
                type="file"
                accept="image/*"
                class="input-form"
                name="photo"
        >
    </div>
    <div class="input-field button mb-3">
        <input class="btn" name="create" type="submit" value="Krijo">
    </div>

</form>

<?php

$db = DB::getDB();

if (isset($_POST['category_delete'])) {
    $id = $_POST['id'];

    $post_categories = $db->sql("SELECT *  FROM post_categories WHERE categories_id  = ? ", [$id]);

    foreach ($post_categories->results() as $post_category) {
        $db->sql("DELETE FROM post_categories WHERE id = ?", [$id]);
    }

    $db->sql("DELETE FROM categories WHERE id = ? ", [$id]);
    Session::flash('success', 'Kategori u fshi me sukses dhe të gjitha postet me këte kategori');
}

?>

<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Kategoria:</th>
            <th>Action:</th>
        </tr>

        <form method="POST" action="#"
              onsubmit="confirm('A jeni i sigurt qe do ta fshini Kategorin! ')">
            <?php if ($category->getAll()) : ?>
                <?php foreach ($category->getAll() as $c) : ?>
                    <tr>
                        <td width="80%"><?= $c->title ?></td>
                        <td>
                            <input type="submit" name="category_delete" value="Delete">
                            <input type="hidden" name="id" value="<?= $c->id ?>"
                        </td>
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
