<button style="display: none;" id="clickButton" onclick='showSuccessToast("Tạo tài khoản thành công","Bạn có thể đăng nhập để mua hàng","success", 5000)'>notification</button>

<?php if (!empty($successAccount)) { ?>
    <script>
        window.addEventListener('load', function() {
            flag = 0;
            if (flag == 0) {
                document.querySelector('#clickButton').click();
                flag = 1;
            }
        })
    </script>
<?php } ?>
<nav aria-label="breadcrumb">
    <div class="container pt-3 mb-4 border-b-primary">
        <ol class="breadcrumb breadcrumb_custom">
            <li class="breadcrumb-item"><a href="?url=home">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
        </ol>
    </div>
</nav>
<div class="auth">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="login_container">
                    <div class="row">
                        <form class="form col" action="?url=auth/signIn" method="POST">
                            <div class="form__title mb-3">
                                <h1>Hello</h1>
                                <p>Log in or create an account</p>
                            </div>
                            <div class="form-group ">
                                <input type="text" placeholder="Email or username" name="username">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" name="password">
                            </div>
                            <div class="form-group" style="display: <?php echo $result = !empty($error) ? '' : 'none' ?>;">
                                <span style="color:red; margin-left:8px"><?php echo $result = !empty($error) ? $error : '' ?></span>
                            </div>
                            <div class="form__btn">
                                <button type="submit">LOGIN</button>
                            </div>
                            <p class="mt-1 text-center">Bạn chưa có tài khoản ? <a href="?url=auth/register">Đăng ký</a></p>
                        </form>
                        <div class="login__img col">
                            <img class="img-fluid" src="./Customer/public/img/login.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>