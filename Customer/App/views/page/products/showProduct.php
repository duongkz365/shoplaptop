<nav aria-label="breadcrumb">
    <div class="container pt-3 mb-4 border-b-primary">
        <ol class="breadcrumb breadcrumb_custom">
            <li class="breadcrumb-item"><a href="?url=home">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="?url=home"><?php echo $category['name'] ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $productDetail['name'] ?></li>
        </ol>
    </div>
</nav>
<div class="product-detail">
    <div class="container">
        <div class="product-detail_container">
            <div class="row">
                <div class="col-12">
                    <div class="product-detail_name">
                        <h5><?php echo $productDetail['name'] ?></h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="product-imgs">
                        <div class="img-display">
                            <div class="img-showcase ">
                                <img class="product-detail_img" src="./product_img/<?php echo $productDetail['img'] ?>" alt="Laptop">

                                <?php foreach (explode(",", $productDetail['list_img']) as $img) { ?>
                                    <img class="product-detail_img" src="./product_img/<?php echo $img ?>" alt="Laptop">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="img-select row-cols-3 justify-content-center">
                            <div class="col img-item_wrap">
                                <div class="img-item ">
                                    <a data-id="1">
                                        <img class="product-detail_img-item" src="./product_img/<?php echo $productDetail['img'] ?>" alt="Laptop">
                                    </a>
                                </div>
                            </div>

                            <?php
                            $total = 1;
                            foreach (explode(",", $productDetail['list_img']) as $img) {
                                $total++;
                            ?>
                                <div class="col img-item_wrap">
                                    <div class="img-item ">
                                        <a data-id="<?php echo $total ?>">
                                            <img class="product-detail_img-item" src="./product_img/<?php echo $img ?>" alt="Laptop">
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="product-detail_content">
                        <div class="row mt-mobile-12">
                            <div class="col-12 col-md-6 col-lg-6">
                                <p class="product-detail_rating ">
                                    Evaluate:
                                    <?php for ($i = 0; $i < $averageStar['star']; $i++) { ?>
                                        <i class="fa-solid fa-star"></i>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="product-detail_comment">Comment: <?php echo mysqli_num_rows($comments); ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="product-detail_desc">
                                    <h5>Product Description</h5>
                                    <p>
                                        <?php echo $productDetail['description'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="product-detail_promotion">
                                <h5>
                                    <i class="fa-solid fa-gift"></i>
                                    Khuyến mãi
                                </h5>
                                <p>
                                    <?php foreach ($promotions as $promotion) { ?>
                                        - Nhập mã <?php echo $promotion['code'] ?> giảm ngay <?php echo number_format($promotion['price'], 0, ',', ',');  ?>đ
                                        <br />
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <div class="product-detail_price show-mobile mt-mobile-12">
                            <p><?php echo number_format($productDetail['sale_price'], 0, ',', ',');  ?> <b>đ</b></p>
                        </div>
                        <?php if ($productDetail['quantity'] > 0) { ?>
                            <div class="row mt-3">
                                <div class="col-12 col-md-9 col-lg-9">
                                    <form method="POST" action="?url=order/addProductToCart/<?php echo $productDetail['id'] ?>&action=1">
                                        <button class="btn btn-pay">
                                            Mua Ngay
                                            <p>(Giao nhanh từ 2h hoặc nhận tại cửa hàng)</p>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-12 col-md-3 col-lg-3 pt-xs-12">
                                    <a class="btn btn-add" href="?url=order/addProductToCart/<?php echo $productDetail['id'] ?>&action=2">
                                        <i class="fa-solid fa-cart-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <?php if (!empty($message)) { ?>
                                <p id="message" class="pt-1" style="margin-left: 12px;"><?php echo $message ?></p>
                            <?php } ?>
                        <?php } else { ?>
                            <h3 class="mt-3">Sản phẩm tạm thời hết hàng</h3>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="product-detail_price mt-mobile-12">
                        <p><?php echo number_format($productDetail['sale_price'], 0, ',', ',');  ?> <b>đ</b></p>
                    </div>
                    <div class="product-detail_list-lazy">
                        <ul>
                            <h5>Yên tâm mua hàng</h5>
                            <li>Uy tín 22 năm Top đầu trên thị trường</li>
                            <li>Sản phẩm chính hãng 100%</li>
                            <li>Trả góp lãi xuất 0% toàn bộ giỏ hàng</li>
                            <li>Trả bảo hành tận nơi sử dụng</li>
                            <li>Bảo hành tận nơi cho doanh nghiệp</li>
                            <li>Vệ sinh miễn phí trọn đời PC, laptop</li>
                            <li>Miễn phí quẹt thẻ khi thanh toán</li>
                        </ul>
                    </div>
                    <div class="product-detail_list-lazy pt-2">
                        <ul>
                            <h5>Miễn phí giao hàng</h5>
                            <li>Giao hàng 2h Hacom-faster</li>
                            <li>Giao hàng miễn phí toàn quốc</li>
                            <li>Nhận hàng và thanh toán tại nhà (Ship-COD)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="comment mt-4">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12 col-lg-8 order-2 order-lg-1">
                <h1>Nhận xét và đánh giá</h1>
                <?php if ($order && mysqli_num_rows($order) > 0) { ?>
                    <form class="comment_input" method="POST" action="?url=comment/create/<?php echo $productDetail['id'] ?>">
                        <div class="form-group">
                            <input value="<?php echo $name = isset($_SESSION['customer']) ? $_SESSION['customer']['email'] : '' ?>" name="email" type="Email" placeholder="Nhập email">
                        </div>
                        <div class="form-group mt-3">
                            <textarea name="content" type="" placeholder="Nhập nội dung"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Đánh giá:</label>
                            <select name="rate">
                                <option value="" disabled selected>-Chọn-</option>
                                <option value="1">1 Sao</option>
                                <option value="2">2 Sao</option>
                                <option value="3">3 Sao</option>
                                <option value="4">4 Sao</option>
                                <option value="5">5 Sao</option>
                            </select>
                        </div>
                        <div class="form-btn mt-3">
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </div>
                    </form>
                <?php } else { ?>
                    <h5>Bạn cần mua hàng để đánh giá sản phẩm này</h5>
                <?php } ?>
            </div>
            <div class="col-12 col-lg-4 order-1 order-lg-2 mb-3">
                <div class="specification">
                    <h2>Thông số kỹ thuật</h2>
                    <ul>
                        <?php while ($row = mysqli_fetch_array($specifications)) { ?>
                            <li>
                                <p><?php echo $row['key'] ?></p>
                                <p><?php echo $row['value'] ?></p>
                            </li>
                        <?php } ?>
                    </ul>

                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 col-lg-8">
                <ul class="comment_list">
                    <?php while ($comment = mysqli_fetch_array($comments)) { ?>
                        <li class="mt-2">
                            <span><?php echo $comment['email'] ?> <b> <?php $date = strtotime($comment['create_at']);
                                                                        $date = date('H:i:s - d/m/Y', $date);
                                                                        echo $date;
                                                                        ?></b></span>
                            <p>
                                Đánh giá:
                                <?php for ($i = 0; $i < $comment['rate']; $i++) { ?>
                                    <i class="fa-solid fa-star"></i>
                                <?php } ?>
                                <br />
                                Nhận xét:
                                <br />
                                <?php echo $comment['content'] ?>
                            </p>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="lazy-component mb-4">
    <div class="container">
        <div class="lazy-component_container pt-3">
            <div class="lazy-component_top row">
                <div class="col-12">
                    <p class="lazy-component_title">
                        Sản phẩm liên quan
                    </p>
                </div>
            </div>
            <div class="lazy-component_main">
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
                    <?php while ($row = mysqli_fetch_array($productByCate)) { ?>
                        <?php if ($row['id'] != $productDetail['id']) { ?>
                            <div class="col">
                                <div class="card card_customer">
                                    <img src="./product_img/<?php echo $row['img'] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                        <p class="card-price">
                                            <span><?php echo number_format($row['sale_price'], 0, ',', ',');  ?>đ</span>
                                            <span><?php echo number_format($row['price'], 0, ',', ',');  ?>đ</span>
                                        </p>
                                        <div class="card-desc">
                                            <p>[HOT] Thu cũ lên đời giá cao - Thủ tục nhanh - Trợ giá lên tới 1.000.000đ </p>
                                        </div>
                                        <ul class="card-rating">
                                            <?php for ($i = 0; $i < $func->handleStarProduct($row['id']); $i++) { ?>
                                                <li>
                                                    <i class="fa-solid fa-star"></i>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <div class="card-heart">
                                            <p>
                                                Yêu thích
                                                <i class="fa-regular fa-heart"></i>
                                            </p>
                                        </div>
                                    </div>
                                    <a href="?url=product/show/<?php echo $row['id'] ?>" class="card-link"></a>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>