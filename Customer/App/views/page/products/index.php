<nav aria-label="breadcrumb">
    <div class="container pt-3 mb-4 border-b-primary">
        <ol class="breadcrumb breadcrumb_custom">
            <li class="breadcrumb-item"><a href="?url=home">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
        </ol>
    </div>
</nav>

<div class="banner pt-1">
    <div class="container">
        <div class="banner_container">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <img class="img-fluid" src="./Customer/public/img/qc-1.png" alt="">
                </div>
                <div class="col-12 col-lg-4">
                    <img class="img-fluid" src="./Customer/public/img/qc-2.png" alt="">
                </div>
                <div class="col-12 col-lg-4">
                    <img class="img-fluid" src="./Customer/public/img/qc-3.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="category-product pt-3">
    <div class="container">
        <div class="category-product_container">
            <div class="row">
                <div class="col-12">
                    <div class="category-product_item">
                        <div class="category-product_title">
                            <h5>Hãng sản xuất</h5>
                        </div>
                        <ul>
                            <?php foreach ($brands as $brand) { ?>
                                <li>
                                    <a onclick="handleParams('brand',<?php echo  $brand['id']  ?>)" style="text-transform: capitalize; cursor: pointer;"><?php echo $brand['name'] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-12">
                    <div class="category-product_item">
                        <div class="category-product_title">
                            <h5>Nhu cầu người dùng</h5>
                        </div>
                        <ul class="category-product_class">
                            <?php foreach ($categories as $category) { ?>
                                <li>
                                    <a style="cursor: pointer;" onclick="handleParams('category',<?php echo $category['id'] ?>)">
                                        <span><?php echo $category['name'] ?></span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="row pt-2">
                <div class="col-12">
                    <div class="category-product_item">
                        <div class="category-product_title">
                            <h5>Sản phẩm</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-5">
                <?php if (mysqli_num_rows($products) > 0) { ?>
                    <?php foreach ($products as $product) { ?>
                        <div class="col">
                            <div class="card card_customer">
                                <img src="./product_img/<?php echo $product['img'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['name'] ?></h5>
                                    <p class="card-price">
                                        <span><?php echo number_format($product['sale_price'], 0, ',', ',');  ?>đ</span>
                                        <span><?php echo number_format($product['price'], 0, ',', ',');  ?>đ</span>
                                    </p>
                                    <div class="card-desc">
                                        <p>[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ </p>
                                    </div>
                                    <ul class="card-rating">
                                        <?php for ($i = 0; $i < $func->handleStarProduct($product['id']); $i++) { ?>
                                            <li>
                                                <i class="fa-solid fa-star"></i>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <a href="?url=product/viewCount/<?php echo $product['id'] ?>" class="card-link"></a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <h1>Không tìm thấy sản phẩm</h1>
                <?php   } ?>
            </div>
        </div>
    </div>
</div>