<div class="sidebar">
    <div class="sidebar__logo">
        <a href="home" class="logo__link">
            <img src="./public/img/logo.png" alt="">
            Laptop Logo
        </a>
    </div>
    <nav class="menu">
        <ul class="menu__list">
            <li class="menu__item">
                <a href="home" class="menu__link
                <?php
                $display = $func->handleActive('home');
                echo $display['active'];
                echo $displayDefault = isset($display['display']) ? $display['display'] : '';
                ?>">
                    <i class="fa-solid fa-shop"></i>
                    Home
                </a>
            </li>
            <li class="menu__item">
                <a href="user" class="menu__link
                <?php
                echo $func->handleActive('user')['active'];
                ?>">
                    <i class="fa-solid fa-clipboard-user"></i>
                    Manage Users
                </a>
            </li>
            <li class="menu__item">
                <a href="product" class="menu__link
                <?php
                echo $func->handleActive('product')['active'];
                ?>">
                    <i class="fa-solid fa-cart-shopping"></i>
                    Manage Products
                </a>
            </li>
            <li class="menu__item">
                <a href="brand" class="menu__link
                <?php
                echo $func->handleActive('brand')['active'];
                ?>">
                    <i class="fa-solid fa-copyright"></i>
                    Manage Brands
                </a>
            </li>
            <li class="menu__item">
                <a href="order" class="menu__link
                <?php
                echo $func->handleActive('order')['active'];
                ?>">
                    <i class="fa-solid fa-truck"></i>
                    Order Management
                </a>
            </li>
            <li class="menu__item">
                <a href="promotion" class="menu__link
                <?php
                echo $func->handleActive('promotion')['active'];
                ?>">
                    <i class="fa-solid fa-gifts"></i>
                    Manage promotions and discounts
                </a>
            </li>
            <li class="menu__item">
                <a href="comment" class="menu__link
                <?php
                echo $func->handleActive('comment')['active'];
                ?>">
                    <i class="fa-regular fa-comment"></i>
                    Manage Comments and reviews
                </a>
            </li>
            <li class="menu__item">
                <a href="category" class="menu__link
                <?php
                echo $func->handleActive('category')['active'];
                ?>">
                    <i class="fa-solid fa-list"></i>
                    Manage Categories
                </a>
            </li>
            <li class="menu__item">
                <a href="customer" class="menu__link
                <?php
                echo $func->handleActive('customer')['active'];
                ?>">
                    <i class="fa-solid fa-user"></i>
                    Manage Customers
                </a>
            </li>
            <li class="menu__item">
                <a href="payment" class="menu__link
                <?php
                echo $func->handleActive('payment')['active'];
                ?>">
                    <i class="fa-solid fa-money-bill"></i>
                    Manage Payments
                </a>
            </li>
            <li class="menu__item">
                <a href="contact" class="menu__link
                <?php
                echo $func->handleActive('contact')['active'];
                ?>">
                     <i class="fa-solid fa-users"></i>
                    Manage Contacts
                </a>
            </li>
        </ul>
    </nav>
</div>