<?php

include_once '../../assets/include/adminHeader.php';
include_once '../../includes/ini.php';

$user = new User();
if (!$user->isLoggendIn()) {
    Go::to('../../');
}
?>
<?php

use Controller\CategoryController as Category;
use Controller\PostController as Post;

$user = new User();

if (!$user->isLoggendIn()) {
    Go::to('index');
}
?>

<?php getErrors(); ?>

<?php
$post = new Post();
$file = new File();

if (isset($_POST['token'])) {
    $f = $_FILES['photo'];

    $file->set($f);
    $file->name('photo');
    $file->max_size(3);
    $file->direcotry('assets/img/category');
    $file->upload();


    $post->create([
        'user_id' => $user->data()->id,
        'title' => Input::get('title'),
        'slug' => slug(Input::get('title')),
        'body' => Input::get('body'),
//            'category' => Input::getArray('category'),
        'image' => $file->file_name,
    ]);
}

if (isset($_POST['post_delete'])) {
    $id = $_POST['id'];
    $post->db->sql("DELETE FROM posts WHERE id = ?", [$id]);
    $image = $post->db->sql("SELECT image FROM posts WHERE id = ?", [$id])->firstResult();
    unlink('../../'.$image->image);
    Session::flash('success', 'Postimim u fshia me sukses');
}

?>


<form action="" method="POST" enctype="multipart/form-data">
    <?= getErrors() ?>
    <?= csrf() ?>
    <div class="input-field mb-3" style="margin-top: 25px;">
        <label for="Titullu">Titulli: </label>
        <input
                class="input-form"
                type="text"
                name="title"
                placeholder="Titulli"

                autofocus
                autocomplete
                value="<?= e(Input::get('title')) ?>"
                oninvalid="this.setCustomValidity('Ju lutem shkruani Titullin');"
                oninput="this.setCustomValidity('')" ;
        >
    </div>

    <div class="input-field mb-3">
        <label for="email">Përshkrimi: </label>
        <textarea
                class="textarea-form"
                name="body"
                rows="8"
                placeholder="Përshkrimi"
                required
                autofocus
                spellcheck="true"
                autocapitalize="on"
                lang="al"
                autocorrect="on"
                oninvalid="this.setCustomValidity('Ju lutem shkruani Pëshkrimin');"
                oninput="this.setCustomValidity('')" ;
        ><?= e(Input::get('body')) ?></textarea
    </div>

    <div class="input-field mb-3" style="margin-top: 25px;">
        <label for="email">Foto: </label>
        <input
                class="input-form"
                type="file"
                name="photo"
                accept="image/*"

                value="<?= trim(strtolower(e(Input::get('photo')))) ?>"
                oninvalid="this.setCustomValidity('Ju lutem selektoni Foton');"
                oninput="this.setCustomValidity('')" ;
        >
    </div>
    <?php $category = new Category(); ?>

    <label for="multi-select">Kategorit: </label>
    <div class="select select-multiple mb-3">
        <select id="multi-select" name="category[]" multiple>
            <?php foreach ($category->getTitle() as $cat): ?>
                <option value="<?= $cat->id ?>"><?= $cat->title ?></option>
            <?php endforeach; ?>
        </select>
        <span class="focus"></span>
    </div>

    <div class="input-field button mb-3 flex-end">
        <input class="btn" type="submit" value="Krijo">
    </div>


</form>

<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Titulli:</th>
            <th>Action:</th>
        </tr>

        <form method="POST" action="#"
              onsubmit="confirm('A jeni i sigurt qe do ta fshini Kategorin! ')">
            <?php if ($post->getAll()->results()) : ?>
                <?php foreach ($post->getAll()->results() as $c) : ?>
                    <tr>
                        <td width="80%"><?= $c->title ?></td>
<!--                        <td>-->
<!--                            <input type="submit" name="post_delete" value="Delete">-->
<!--                            <input type="hidden" name="id" value="--><?php ////echo $c->id ?><!--"-->
<!--                        </td>-->
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2" style="text-align: center">Nuk ka asnje Post</td>
                </tr>
            <?php endif; ?>

        </form>


    </table>
</div>

<?php
include_once '../../assets/include/adminFooter.php';
?>
