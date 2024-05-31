<div class="login">
    <div class="login__header">
        <div class="login__logo">
            <a class="logo__link">
                ----Login----
            </a>
        </div>
    </div>
    <form action="auth/signIn" class="login__form" method="POST">
        <div class="form-group">
            <i class="fa-regular fa-circle-user user"></i>
            <input type="text" placeholder="Email or phone number" name="username">
        </div>
        <div class="form-group">
            <i class="fa-solid fa-key key"></i>
            <input type="password" placeholder="Password" name="password">
        </div>
        <div class="form-group" style="display: <?php echo $result = !empty($error) ? '' : 'none' ?>;">
            <span style="color:red; margin-left:8px"><?php echo $result = !empty($error) ? $error : '' ?></span>
        </div>
        <div class="login__action">
            <div class="remember__login">
            </div>
            <div class="register">
                <a href="#" class="register__link">Quên password?</a>
            </div>
        </div>
        <div class="login__btn">
            <button type="submit" class="btn">SIGN IN</button>
        </div>
        <p class="text-center">You are not have account? <a href="#">REGISTER?</a></p>
    </form>

</div>