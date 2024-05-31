<nav aria-label="breadcrumb">
    <div class="container pt-3 mb-4 border-b-primary">
        <ol class="breadcrumb breadcrumb_custom">
            <li class="breadcrumb-item"><a href="?url=home">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
        </ol>
    </div>
</nav>
<div class="cart">
    <div class="container">

        <div class="cart__container">
            <div class="cart__title">
                <h1>Thông tin giỏ hàng</h1>
                <div class="row justify-content-end">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <form action="?url=order/addPromotion" method="POST">
                            <div class="cart_promotion">
                                <div class="cart_promotion-input">
                                    <label for="">Mã giảm giá</label>
                                    <input type="text" name="code">
                                </div>
                                <div class="cart_promotion-btn">
                                    <button>Thêm</button>
                                </div>
                            </div>
                            <span class="cart_promotion-error"><?php echo $result = isset($error) ? $error : ''; ?></span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="cart__table">
                <div class="table_rp">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>IMG</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>AMount</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            if (isset($_SESSION['cart'][$_SESSION['customer']['id']]) && is_array($_SESSION['cart'][$_SESSION['customer']['id']])) {
                                foreach ($_SESSION['cart'][$_SESSION['customer']['id']]['listProduct'] as $key => $value) {
                                    $total +=  $value['sale_price'] * $value['quantity'];
                            ?>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>
                                            <div class="img">
                                                <img src="./product_img/<?php echo $value['img'] ?>" alt="">
                                            </div>
                                        </td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo
                                            number_format($value['sale_price'], 0, ',', ',');
                                            ?>đ</td>
                                        <td class="text-center td-quantity">
                                            <div class="d-flex align-items-center justify-content-center gap-2">
                                                <a class="btn-update" href="?url=order/increaseProductFromCart/<?php echo $value['id'] ?>">+</a>
                                                <p><?php echo $value['quantity'] ?></p>
                                                <a class="btn-update" href="?url=order/decreaseProductFromCart/<?php echo $value['id'] ?>">-</a>
                                            </div>
                                        </td>
                                        <td><?php echo
                                            number_format($value['sale_price'] * $value['quantity'], 0, ',', ',');
                                            ?>đ</td>

                                        <td class="text-center">
                                            <a href="?url=order/removeProductFromCart/<?php echo $value['id'] ?>">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="table__bottom">
                    <div class="row justify-content-end mb-1">
                        <div class="col-12 col-8 col-lg-4">
                            <?php if (!empty($message)) { ?>
                                <p id="message" class="pt-1" style="margin-left: 12px;"><?php echo $message ?></p>
                            <?php } ?>
                        </div>
                        <div class="col-12 col-8 col-lg-4">
                            <div class="table__total">
                                <p>Tổng Tiền hàng</p>
                                <p><?php echo number_format($total, 0, ',', ',');  ?>đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end mb-1">
                        <div class="col-12 col-8 col-lg-4">
                            <div class="table__total">
                                <p>Giảm giá</p>
                                <p><a href="?url=order/removePromotion" style="display:<?php echo $promotion_price = isset($_SESSION['cart'][$_SESSION['customer']['id']]['promotion']['price']) ? '' : 'none' ?>;" class="removePromotion"><i class="fa-solid fa-trash"></i></a> <?php echo $promotion_price = isset($_SESSION['cart'][$_SESSION['customer']['id']]['promotion']['price']) ? number_format($_SESSION['cart'][$_SESSION['customer']['id']]['promotion']['price'], 0, ',', ',') : 0;  ?>đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end mb-3">
                        <div class="col-12 col-8 col-lg-4">
                            <div class="table__total">
                                <p>Tổng Thanh toán</p>
                                <p><?php echo number_format($total - $promotion_price = isset($_SESSION['cart'][$_SESSION['customer']['id']]['promotion']['price']) ? $_SESSION['cart'][$_SESSION['customer']['id']]['promotion']['price'] : 0, 0, ',', ',');  ?>đ</p>
                            </div>
                        </div>
                    </div>
                    <form class="table__pay" action="?url=order/pay" method="POST">
                        <input type="hidden" name="total" value="<?php echo $total ?>">
                        <a href="?url=home">Come back</a>
                        <button type="submit">Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>