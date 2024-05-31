<div class="container pt-3">
    <div class="row">
        <div class="col-lg-4">
            <ul class="list-group category-list">
                <h5>Danh mục</h5>
                <?php foreach ($categories as $category) { ?>
                    <li class="list-group-item">
                        <a href="?url=product/ByCate/<?php echo $category['id'] ?>">
                            <?php echo $category['name'] ?>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </li>
                <?php } ?>
                <li class="list-group-item">
                    <a href="?url=product">
                        Xem tất cả
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-12 col-lg-4 slider_qc">
            <div>
                <img class="img-fluid" src="./Customer/public/img/mackbookpro.png" alt="">
            </div>
            <div>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./Customer/public/img/mackbookpro.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./Customer/public/img/the-qua-tang.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-12  col-lg-4 pt-mobile-12">
            <div class="row">
                <div class="col-3 col-lg-3">
                    <div class="img-qc">
                        <img src="./Customer/public/img/giam-20tr.png" alt="" class="">
                        <img src="../../../../../Customer/public/img/giam-20tr.png" alt="" class="">
                    </div>
                </div>
                <div class="col-3 col-lg-3">
                    <div class="img-qc">
                        <img src="./Customer/public/img/giam-20tr.png" alt="" class="">
                    </div>
                </div>
                <div class="col-3 col-lg-3">
                    <div class="img-qc">
                        <img src="./Customer/public/img/giam-20tr.png" alt="" class="">
                    </div>
                </div>
                <div class="col-3 col-lg-3">
                    <div class="img-qc">
                        <img src="./Customer/public/img/giam-20tr.png" alt="" class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container pt-3 product-sale">
    <div class="product-sale_container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 product-sale_item">
                <div class="row">
                    <div class="col-5 col-lg-5">
                        <img src="./Customer/public/img/laptop.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-7 col-lg-7">
                        <p class="product-sale_title">Laptop gaming</p>
                        <p class="product-sale_desc">Giá chỉ từ</p>
                        <p class="product-sale_price">15.499.000Đ</p>
                    </div>
                    <div class="col-12 col-lg-12 ">
                        <p class="product-sale_slogan">Cam kết</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 product-sale_item">
                <div class="row">
                    <div class="col-5 col-lg-5">
                        <img src="./Customer/public/img/laptop1.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-7 col-lg-7">
                        <p class="product-sale_title">Laptop Cảm ứng</p>
                        <p class="product-sale_desc">Giá chỉ từ</p>
                        <p class="product-sale_price">18.999.000Đ</p>
                    </div>
                    <div class="col-12 col-lg-12">
                        <p class="product-sale_slogan">Bán giá</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 product-sale_item">
                <div class="row">
                    <div class="col-5 col-lg-5">
                        <img src="./Customer/public/img/laptop2.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-7 col-lg-7">
                        <p class="product-sale_title">Laptop văn phòng</p>
                        <p class="product-sale_desc">Giá chỉ từ</p>
                        <p class="product-sale_price">8.499.000Đ</p>
                    </div>
                    <div class="col-12 col-lg-12">
                        <p class="product-sale_slogan">Tốt nhất</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 product-sale_item">
                <div class="row">
                    <div class="col-5 col-lg-5">
                        <img src="./Customer/public/img/laptop1.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="col-7 col-lg-7">
                        <p class="product-sale_title">Laptop doanh nhân</p>
                        <p class="product-sale_desc">Giá chỉ từ</p>
                        <p class="product-sale_price">20.499.000Đ</p>
                    </div>
                    <div class="col-12 col-lg-12">
                        <p class="product-sale_slogan">Thị trường</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="banner pt-3">
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

<!-- Product Nổi bật-->
<?php require_once './Customer/App/views/partials/product-hot.php' ?>

<?php if (mysqli_num_rows($productViewCount) > 0) { ?>
    <!-- Product Hot -->
    <?php require_once './Customer/App/views/partials/product-viewCount.php' ?>
<?php } ?>

<!-- Product new -->
<?php require_once './Customer/App/views/partials/product-new.php' ?>