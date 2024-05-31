<nav aria-label="breadcrumb">
    <div class="container pt-3 mb-4 border-b-primary">
        <ol class="breadcrumb breadcrumb_custom">
            <li class="breadcrumb-item"><a href="?url=home">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
        </ol>
    </div>
</nav>
<div class="auth contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <div class="login_container">
                    <?php if (isset($_SESSION['customer'])) { ?>
                        <div class="row">
                            <?php if ($type == 'add') { ?>
                                <p>Cảm ơn bạn đã liên hệ với chúng tôi!</p>
                                <script>
                                    setTimeout(() => {
                                        window.location.href = "http://localhost/ShopLapTop/?url=contact";
                                    }, "2000");
                                </script>
                            <?php } ?>
                            <form class="form col" action="?url=contact/create/<?php echo $_SESSION['customer']['id'] ?>" method="POST">
                                <div class="form__title mb-3">
                                    <h1>Send contact information</h1>
                                </div>
                                <div class="form-group ">
                                    <input type="text" placeholder="Họ và tên" name="name">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Email or phone number" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Nội dung gửi cho chúng tôi" name="content">
                                </div>
                                <?php if ($type == 'error') { ?>
                                    <div class="form-group">
                                        <span style="color:red; margin-left: 8px;"><?php echo $message =  !empty($message) ? $message : '' ?> </span>
                                    </div>
                                <?php } ?>
                                <div class="form__btn pt-4">
                                    <button type="submit">SEND US NOW</button>
                                </div>
                            </form>
                        </div>
                    <?php } else { ?>
                        <p>Vui lòng đăng nhập để có thể liên hệ với chúng tôi. <a href="?url=auth/login">Tại đây</a></p>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div>