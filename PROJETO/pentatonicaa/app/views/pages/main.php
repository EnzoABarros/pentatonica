<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pentatonica</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/public/images/logo.png" type="image/png">
</head>
<body>
    <?php require_once __DIR__ . "/../layouts/header.php" ?>

    <div class="slider">
        <div class="slides">
            <img src="/pentatonicaa/public/images/banner1.png" class="slide active">
            <img src="/pentatonicaa/public/images/banner2.png" class="slide">
            <img src="/pentatonicaa/public/images/banner3.png" class="slide">
        </div>

        <div class="indicators">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>

    <h1 class="titulo">
        Bem-vindo( a ) à <span class="titulo-back">pentatonica.</span>
    </h1>


    <script src="js/slider.js"></script>

</body>
</html>
