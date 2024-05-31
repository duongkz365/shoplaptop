<header class="header">
    <div class="header_container row align-items-center">
        <div class="col-2 col-sm-4 col-lg-3  order-1">
            <a href="?url=home" class="header_logo">
                <div class="logo_img">
                    <img src="./Customer/public/img/logo.png" alt="">
                </div>
                <p>Laptop logo</p>
            </a>
        </div>
        <div class="col-2 col-sm-1 col-lg-2 d-flex justify-content-end order-3 order-lg-2">
            <div class="header_btnCategory" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="fa-solid fa-bars"></i>
                <p>Danh mục</p>
                <ul class="menu-category">
                    <?php foreach ($func->getCategory() as $key => $value) { ?>
                        <li>
                            <a href="?url=product/ByCate/<?php echo $value['id'] ?>">
                                <?php echo $value['name'] ?>
                            </a>
                        </li>

                    <?php } ?>
                    <li><a href="?url=product">Xem tất cả</a></li>
                </ul>
            </div>
        </div>
        <div class="col-8 col-sm-7 col-lg-3 order-2 order-lg-3">
            <form class="header_search" method="POST" action='?url=product/search'>
                <input type="text" name="name" id="" placeholder="Tìm kiếm ...">
                <button type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <div class="col-lg-4 order-lg-4">
            <ul class="header_menu">
                <li>
                    <a href="?url=contact">
                        <i class="fa-solid fa-headset"></i>
                        <p>Liên hệ</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-gift"></i>
                        <p>Khuyến mãi</p>
                    </a>
                </li>
                <li>
                    <a href="?url=tracking">
                        <i class="fa-solid fa-truck"></i>
                        <p>Giao hàng</p>
                    </a>
                </li>
                <li>
                    <a href="?url=order/cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <p>Giỏ hàng</p>
                    </a>

                    <?php
                    if (isset($_SESSION['customer'])) {
                        $customer_id = $_SESSION['customer']['id'];
                        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
                        $totalQuantity = 0;

                        if (isset($cart[$customer_id])) {
                            foreach ($cart[$customer_id]['listProduct'] as $product) {
                                $totalQuantity += $product['quantity'];
                            }
                        }
                    ?>
                        <span><?php echo $total = isset($totalQuantity) ? $totalQuantity : 0 ?></span>
                    <?php
                    }
                    ?>
                </li>
                <li>
                    <a href="<?php echo $name = isset($_SESSION['customer']) ? '#' : '?url=auth/login' ?>">
                        <i class="fa-regular fa-circle-user"></i>
                        <p><?php echo $name = isset($_SESSION['customer']) ? $_SESSION['customer']['name'] : 'Login' ?></p>
                    </a>
                    <ul style="display:<?php echo $display = isset($_SESSION['customer']) ? '' : 'none'; ?>">
                        <li>
                            <a href="?url=Auth/logout">
                                Đăng xuất
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                            <a href="?url=order/index">
                                Đơn hàng đã mua
                                <i class="fa-solid fa-folder-open"></i>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas -->
    <div class="offCanvas_custom offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <div class="menuMobile_logo">
                <img src="./Customer/public/img/logo.png" alt="">
                <p>Laptop logo</p>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="menuMobile">
                <li>
                    <a href="?url=contact">
                        <i class="fa-solid fa-headset"></i>
                        Liên hệ
                    </a>
                </li>
                <li class="d-flex justify-content-between">
                    <div>
                        <a>
                            <i class="fa-solid fa-bars"></i>
                            Danh mục
                        </a>
                        <ul class="sub_menuMobile">
                            <?php foreach ($func->getCategory() as $key => $value) { ?>
                                <li>
                                    <a href="?url=product/ByCate/<?php echo $value['id'] ?>">
                                        <?php echo $value['name'] ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <i class="fa-solid fa-chevron-down"></i>
                </li>
                <li>
                    <a>
                        <i class="fa-solid fa-gift"></i>
                        Khuyến mãi
                    </a>
                </li>
                <li>
                    <a href="?url=tracking">
                        <i class="fa-solid fa-truck"></i>
                        Giao Hàng
                    </a>
                </li>
                <li>
                    <a href="?url=order/cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Giỏ hàng<?php
                                if (isset($_SESSION['customer'])) {
                                    $customer_id = $_SESSION['customer']['id'];
                                    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
                                    $totalQuantity = 0;

                                    if (isset($cart[$customer_id])) {
                                        foreach ($cart[$customer_id]['listProduct'] as $product) {
                                            $totalQuantity += $product['quantity'];
                                        }
                                    }
                                ?>
                        <?php echo $total = isset($totalQuantity) ? '(' . $totalQuantity . ')' : 0 ?>
                    <?php
                                }
                    ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $name = isset($_SESSION['customer']) ? '#' : '?url=auth/login' ?>">
                        <i class="fa-regular fa-circle-user"></i>
                        <?php echo $name = isset($_SESSION['customer']) ? $_SESSION['customer']['name'] : 'Login' ?>
                    </a>
                    <ul style="display:<?php echo $display = isset($_SESSION['customer']) ? '' : 'none'; ?>;margin-left: 12px;">
                        <li>
                            <a href="?url=Auth/logout">
                                Đăng xuất
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                            <a href="?url=order/index">
                                Đơn hàng đã mua
                                <i class="fa-solid fa-folder-open"></i>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</header>