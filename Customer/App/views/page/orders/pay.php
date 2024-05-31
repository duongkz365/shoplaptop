<nav aria-label="breadcrumb">
    <div class="container pt-3 mb-4 border-b-primary">
        <ol class="breadcrumb breadcrumb_custom">
            <li class="breadcrumb-item"><a href="?url=home">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
        </ol>
    </div>
</nav>
<form class="pay" action="?url=order/thank" method="POST">
    <div class="container">
        <div class="pay__container">
            <div class="row">
                <div class="col-12 col-lg-6 bl-pay">
                    <div class="form">
                        <div class="form__title">
                            <h1 ">Thông tin nhận hàng</h1>
                            </div>
                        <div class=" form-group pt-3">
                                <input type="text" placeholder="Tên Người nhận" name="name_receive">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Địa chỉ người nhận" name="address_receive">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Số điện thoài người nhận" name="phone_receive">
                        </div>
                        <div class="form-group">
                            <textarea type="text" placeholder="Ghi chú" name="note"></textarea>
                        </div>
                        <div class="form-group">
                            <select name="payment" class="payment">
                                <option disabled selected>Phương thức thanh toán</option>
                                <?php foreach ($payments as $payment) { ?>
                                    <option value='<?php echo $payment['id'] ?>'><?php echo $payment['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="delivery" name="delivery" class="payment">
                                <option disabled selected>Phương thức giao hàng</option>
                                <option value="Giao hàng bình thường">Giao hàng bình thường</option>
                                <option value="Giao hàng nhanh">Giao hàng nhanh</option>
                                <option value="Giao hàng tiết kiệm">Giao hàng tiết kiệm</option>
                                <option value="Giao hàng hỏa tốc">Giao hàng hỏa tốc</option>
                            </select>
                        </div>
                        <?php if (!empty($error)) { ?>
                            <div class="form-group">
                                <span style="color:red; margin-left:8px"><?php echo $error ?></span>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="total" value="<?php echo $totalPrice - $promotion_price = isset($_SESSION['cart'][$_SESSION['customer']['id']]['promotion']['price']) ? $_SESSION['cart'][$_SESSION['customer']['id']]['promotion']['price'] : 0; ?>">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="pay__right">
                        <h5>Thông tin đơn hàng</h5>
                        <p>
                            Tổng đơn hàng: <?php echo number_format($totalPrice, 0, ',', ',') ?>đ
                            <br />
                            Phí giao hàng: <b id="transport-fee"></b>đ
                            <br />
                            Khuyến mãi: <?php echo $promotion_price = isset($_SESSION['cart'][$_SESSION['customer']['id']]['promotion']['price']) ? number_format($_SESSION['cart'][$_SESSION['customer']['id']]['promotion']['price'], 0, ',', ',') : 0;  ?>đ
                        </p>
                        <span>Tổng tiền: <b id='show-total'><?php echo number_format($totalPrice - $promotion_price = isset($_SESSION['cart'][$_SESSION['customer']['id']]['promotion']['price']) ? $_SESSION['cart'][$_SESSION['customer']['id']]['promotion']['price'] : 0, 0, ',', ',');  ?>đ</b></span>
                        <p class="pay__desc">Đã bao gồm VAT(nếu có)</p>
                        <div id='total' style="display: none;"><?php echo $totalPrice - $promotion_price = isset($_SESSION['cart'][$_SESSION['customer']['id']]['promotion']['price']) ? $_SESSION['cart'][$_SESSION['customer']['id']]['promotion']['price'] : 0;  ?></div>
                        <input name="transportFee" type="number" style="display:none" id="transport-fee-input">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <button type="submit" class="btn-submit">Xác nhận giỏ hàng</button>
            </div>
        </div>
    </div>
</form>
<script>
    window.addEventListener('load', function() {
        const delivery = document.querySelector('#delivery');
        const transportFee = document.querySelector('#transport-fee');
        const transportFeeInput = document.querySelector('#transport-fee-input');
        const total = document.querySelector('#total');
        const showTotal = document.querySelector('#show-total');
        if (delivery) {
            delivery.onchange = function(event) {
                if (event.target.value === 'Giao hàng tiết kiệm') {
                    transportFee.innerHTML = ' 20.000';
                    const result = total.textContent - 20000;
                    showTotal.innerHTML = (result).toLocaleString('en-US') + 'đ';
                    transportFeeInput.value = 20000;
                } else if (event.target.value === 'Giao hàng bình thường') {
                    transportFee.innerHTML = ' 50.000';
                    const result = total.textContent - 50000;
                    showTotal.innerHTML = (result).toLocaleString('en-US') + 'đ';
                    transportFeeInput.value = 50000;
                } else if (event.target.value === 'Giao hàng nhanh') {
                    transportFee.innerHTML = ' 100.000';
                    const result = total.textContent - 100000;
                    showTotal.innerHTML = (result).toLocaleString('en-US') + 'đ';
                    transportFeeInput.value = 100000;
                } else if (event.target.value === 'Giao hàng hỏa tốc') {
                    transportFee.innerHTML = ' 200.000';
                    const result = total.textContent - 200000;
                    showTotal.innerHTML = (result).toLocaleString('en-US') + 'đ';
                    transportFeeInput.value = 200000;
                }
            }
        }

    })
</script>