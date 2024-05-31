<div class="lazy-component mb-4">
    <div class="container">
        <div class="lazy-component_container">
            <div class="lazy-component_top row">
                <div class="col-12 col-lg-4">
                    <p class="lazy-component_title">
                        Sản phẩm nổi bật
                    </p>
                </div>
                <div class="col-12 col-md-8 col-lg-8">
                    <ul class="lazy-component_list">
                        <?php foreach ($brands as $brand) { ?>
                            <li>
                                <a href="?url=product/byBrand/<?php echo $brand['id'] ?>">
                                    <?php echo $brand['name'] ?>
                                </a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="?url=product">
                                Xem tất cả
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="lazy-component_main">
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
                    <?php while ($product = mysqli_fetch_array($productHots)) { ?>
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
                </div>
            </div>
        </div>
    </div>
</div>