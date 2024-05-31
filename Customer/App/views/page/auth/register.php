<nav aria-label="breadcrumb">
    <div class="container pt-3 mb-4 border-b-primary">
        <ol class="breadcrumb breadcrumb_custom">
            <li class="breadcrumb-item"><a href="?url=home">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
        </ol>
    </div>
</nav>
<div class="auth register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <form class="form" action="?url=auth/create" method="POST">
                    <div class="form__title">
                        <h1>Register</h1>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Họ và tên" name="name">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Mật khẩu" name="pass">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Nhập lại mật khẩu" name="pass_r">
                    </div>
                    <div class="form-group">
                        <input type="date" placeholder="Ngày sinh" name="birthday">
                    </div>
                    <div class="form-group">
                        <textarea type="text" placeholder="Địa chỉ" name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Điện thoại" name="phoneNumber">
                    </div>
                    <div class="form-group" style="display: <?php echo $result = !empty($error) ? '' : 'none' ?>;">
                        <span style="color:red; margin-left:8px"><?php echo $result = !empty($error) ? $error : '' ?></span>
                    </div>
                    <div class="form__btn">
                        <button type="submit">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>