<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title = isset($pageName) ? $pageName : 'Document' ?></title>
    <!-- Text font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@400;500;600;700&family=Cormorant+Garamond:wght@300;400;500;600;700&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <base href="/ShopLapTop/">
    <!-- Font icon -->
    <link rel="stylesheet" href="./Customer//public/font/font-icon/css/all.css">
    <!-- Link file -->
    <link rel="stylesheet" href="./Customer/public/css/main.css">
</head>

<body>
    <div id="toast-message"></div>
    <div class="wrapper">
        <!-- Header -->
        <?php require_once './Customer/App/views/partials/header.php'; ?>

        <!-- main -->
        <main class="main">
            <?php require_once "./Customer/App/views/page/${page}.php" ?>
        </main>

        <!-- footer -->
        <?php require_once './Customer/App/views/partials/footer.php'; ?>
    </div>

    <a id="toTop">
        <i class="fa-solid fa-chevron-up"></i>
        <b>
            Lên đầu
        </b>
    </a>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" crossorigin="anonymous"></script>
    <!-- File JS -->
    <script src="./Customer/public/js/toast-message.js"></script>
    <script src="./Customer/public/js/app.js"></script>
</body>

</html>