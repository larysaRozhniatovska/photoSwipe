<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $page?><?= TEXT_SITE_NAME?></title>
    <link rel="stylesheet" href="<?=CSS_DIR . 'styles.css'?>">
    <link rel="stylesheet" href="<?=CSS_DIR . 'photoswipe.css'?>">
</head>
<body>
<?php include VIEWS_COMMON_DIR . 'header.php';?>
<main>
    <?php include VIEWS_PAGES_DIR . $page . '.php'?>
</main>
</body>
<script src="<?=JS_DIR . 'script.js'?>"  type="module"></script>
</html>
