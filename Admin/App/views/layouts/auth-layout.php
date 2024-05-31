<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        echo $title = isset($pageName) ? $pageName : 'Document';
        ?>
    </title>
    <base href="/ShopLapTop/Admin/">
    <link rel="stylesheet" href="./public/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@400;500;600;700&family=Cormorant+Garamond:wght@300;400;500;600;700&family=Dancing+Script:wght@400;500;600;700&family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./public/font/font-icon/css/all.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php require_once "./App/views/page/${page}.php" ?>
        </div>
    </div>

    <!--link JS  -->
    <script src="./public/js/main.js"></script>
</body>

</html>