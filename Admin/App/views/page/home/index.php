<div class="welcome">
    <h4 class="welcome__text">Hi, Welcomeback!</h4>
</div>
<div class="card">
    <div class="card-item">
        <div class="card-item__icon">
            <i class="fa-solid fa-cart-shopping"></i>
        </div>
        <div class="card-item__desc">
            <p class="desc__name">New Orders</p>
            <p class="desc__price"><?php echo $totalOrderNew['orderNumber']  ?> </p>
        </div>
    </div>
    <div class="card-item">
        <div class="card-item__icon">
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="card-item__desc">
            <p class="desc__name">Total Customer</p>
            <p class="desc__price"><?php echo $totalCustomer['customerNumber']  ?></p>
        </div>
    </div>
    <div class="card-item">
        <div class="card-item__icon">
            <i class="fa-solid fa-shop"></i>
        </div>
        <div class="card-item__desc">
            <p class="desc__name">Total Product</p>
            <p class="desc__price"><?php echo $totalProduct['productNumber']  ?></p>
        </div>
    </div>
    <div class="card-item">
        <div class="card-item__icon">
            <i class="fa-solid fa-chart-line"></i>
        </div>
        <div class="card-item__desc">
            <p class="desc__name">Total sales</p>
            <p class="desc__price"><?php echo number_format($totalPrice['totalPrice'], 0, ' ', ' ');  ?> </p>
        </div>
    </div>
</div>