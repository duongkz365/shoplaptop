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
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./public/font/font-icon/css/all.css">
    <script type="text/javascript" src="./public/library/ckeditor5/ckeditor.js"></script>
    <style>
        .notifications{
            position: absolute;
            top: 30px;
            z-index: 9;
            visibility: hidden;
            right: 20px;
            transition: 0.5s all;
        }
        .notifications.active{
            top: 90px;
            transition: 0.3s all;
            visibility: visible;
        }
        .alert {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }
        .alert.d-none{
            display: none;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <!-- sideBar -->
            <?php require_once './App/views/partials/sidebar.php' ?>

            <!-- Header -->
            <?php require_once './App/views/partials/header.php' ?>

            <div id="notifications" class="notifications">
                <div id="alert-add" class="alert alert-success d-none" role="alert">
                    Đã thêm thành công!
                </div>
                <div id="alert-update" class="alert alert-success d-none" role="alert">
                    Đã cập nhật thành công!
                </div>
                <div id="alert-del" class="alert alert-danger d-none" role="alert">
                   Đã xoá thành công!
                </div>
                <div id="alert-error" class="alert alert-danger d-none" role="alert"></div>
            </div>


            <!-- main -->
            <main class="main">
                <!-- main__content -->
                <div class="content" style="<?php echo $func->handlePaddingContent(); ?>">
                    <?php require_once './App/views/partials/pageLink.php' ?>
                    <?php require_once './App/views/partials/notificationAction.php' ?>
                    <?php require_once "./App/views/page/${page}.php" ?>
                </div>
            </main>
        </div>
    </div>

    <!--link JS  -->
    <script src="./public/js/main.js"></script>
    <script src="./public/js/notification.js"></script>
    
    <script>
        var element = document.getElementById("notifications");
        var alert_add = document.getElementById("alert-add");
        var alert_update = document.getElementById("alert-update");
        var alert_del = document.getElementById("alert-del");
        var alert_error = document.getElementById("alert-error");
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const type = urlParams.get('type');
        if (type){
            setTimeout(() => {
                element.classList.add('active');
                if (type === 'add') {
                    alert_add.classList.remove('d-none');
                } else if (type === 'update') {
                    alert_update.classList.remove('d-none');
                } else if (type === 'del') {
                    alert_del.classList.remove('d-none');
                } else if (type === 'error') {
                    alert_error.classList.remove('d-none');
                    alert_error.innerHTML = urlParams.get('message');
                }
                setTimeout(() => {
                    element.classList.remove('active');
                    alert_add.classList.add('d-none');
                    alert_update.classList.add('d-none');
                    alert_del.classList.add('d-none');
                    window.location.href = window.location.pathname;
                }, "2000");
            }, "500");
        }
    </script>
</body>

</html>