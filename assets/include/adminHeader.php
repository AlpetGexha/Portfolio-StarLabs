<?php
include_once '../../includes/ini.php';
?>

<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">

<head>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        } //Mos u submit nese bohet refresh faqja
    </script>
    <link rel=
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio Website</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<div class="admin">
    <div class="menu-toggle">
        <div class="hamburger">
            <span></span>
        </div>
    </div>

    <aside class="sidebar">
        <h3>Menu</h3>

        <nav class="menu">
            <?php
            $myfiles = scandir('../../admin/page');
            array_shift($myfiles);
            array_shift($myfiles);
            foreach ($myfiles as $file) {
                $file = str_replace(".php","",$file);
                echo ' <a href="' .$file . '" class="menu-item">'.ucfirst($file).'</a>';
            }
            ?>
            <a href="../../index" class="menu-item is-active">Ballina</a>
            <a href="../../logout" class="menu-item is-active">Shkyqu</a>
        </nav>

    </aside>

    <main class="content mt-5">
