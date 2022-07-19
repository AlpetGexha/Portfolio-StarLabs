<?php include 'assets/include/header.php'; ?>

<?php
$db = DB::getDB();
$id = $_GET['slug'];
$row = $db->get('posts', ['slug', '=', $id])->firstResult();

if (!$id) {
    Go::to('index.php');
} else {
    if ($row === null) {
        Go::to(404);
    }
}
//$db->update('posts', $row->id, [
//    'views' => $row->views + 1,
//]);

// +1 after refresh
$db->sql('UPDATE posts SET views = views + 1 WHERE id = ?', [$row->id]);


// make next post
//$next = $db->get('posts', ['id', '>', $row->id])->firstResult();
//$previus = $db->get('posts', ['id', '<', $row->id])->firstResult();

?>

<div class="image-container">
    <div class="text">AlpetG</div>
</div>

<style>

    .next-pre {
        display: flex;
        justify-content: space-between;
        margin: 0 auto;
        width: 100%;
        padding: 1rem;
    }


</style>


<section class="single_post">
    <div class="max-width" style="max-width: 2000px">
        <div class="card">
            <div class="card__header single_post_info">
                <h2> <?= $row->title ?> </h2>
                <div class="single-image">
                    <div class="single_post_info_show">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="far fa-calendar-alt"><?= strftime('%e %B, %Y', strtotime($row->created_at)) ?></i>
                                    <i class="far fa-eye fa-x2"><?= $row->views ?></i>
                                    <i class="far fa-user fa-x2"> <?= config('info/name') ?> </i>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <img src="<?= $row->image ?>" alt="<?= $row->title ?>" title="<?= $row->title ?> ">
                </div>
            </div>

            <div class="card__body">
                <p>
                    <?= $row->body ?>
                </p>
            </div>
        </div>

    </div>
</section>


<?php include 'assets/include/footer.php'; ?>
