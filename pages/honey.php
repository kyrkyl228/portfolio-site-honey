<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/null.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/honey.css">

    <script src="../js/AJAX/basket-create.js"></script>
    <script src="../js/AJAX/honey-product-change-values.js"></script>
    <script src="../js/footer-js/footer-pos.js"></script>
    <title>Document</title>
</head>
<body>
    <div id="head__container"></div>

    <script src="../components/header/header.js"></script>
    <link rel="stylesheet" href="../components/header/header.css">
    <script src="../js/header-js/header-menu.js"></script>

    <div class="content">
        <?php
            include "../php/honey-list-get.php"
        ?>
    </div>

    <div class="foot__container" id="foot__container"></div>

    <script src="../components/footer/footer.js"></script>
    <link rel="stylesheet" href="../components/footer/footer.css">
</body>
</html>