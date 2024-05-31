<header class="header">
    <div class="header__left">
        <div class="directional"><i class="fa-sharp fa-solid fa-bars"></i></div>
    </div>
    <div class="header__mid">
        <form action="<?php echo $url = isset($func->getUrl()[0])  ? $func->getUrl()[0] : '' ?>/search" style="display:<?php echo $display = (empty($func->getUrl()[0]) || $func->getUrl()[0] == 'home') ? 'none' : '' ?>;" method="POST">
            <div class="form-search-group">
                <input type="text" placeholder="Search..." name='name'>
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>
    <div class="header__right">
        <div class="header__notification">
            <i class="fa-regular fa-envelope"></i>
        </div>
        <div class="user">
            <div class="user__avatar">
                <i class="fa-solid fa-user-gear"></i>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="user__name">

                <ul class="user-menu">
                    <li class="user-menu__item text-center">
                        <a href="#" class="user-menu__link">
                            <?php echo $name = isset($_SESSION['login']) ? $_SESSION['login']['name'] : 'Admin'; ?>
                        </a>
                    </li>
                    <li class="user-menu__item">
                        <a href="auth/logout" class="user-menu__link">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>