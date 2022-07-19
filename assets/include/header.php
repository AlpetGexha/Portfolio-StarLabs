<?php include_once 'includes/ini.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        } //Mos u submit nese bohet refresh faqja
    </script>
    <link rel='shortcut icon' type='image/x-icon' href="assets/img/logo.svg">
    <meta charset="UTF-8">
    <meta name="theme-color" content="#343a40">
    <meta name='robots' content='max-image-preview:large' />
    <meta name="Author" content="Alpet Gexha">

    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= config('info/app_name') ?>" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="<?=  isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http" . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>" />
    <meta property="og:image" content="assets/img/logo.png" /> <!-- photo url  -->
    <meta property="og:image:width" content="200" />
    <meta property="og:image:height" content="200" />
    <meta property="og:image:alt" content="AlpetG" />
    <meta property="og:locale" content="en_GB" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= config('info/app_name') ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /><script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<div class="scroll-up-btn">
    <i class="fas fa-angle-up"></i>
</div>
<?php include 'nav.php' ?>