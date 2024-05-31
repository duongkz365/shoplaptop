<nav aria-label="breadcrumb">
    <div class="container pt-3 mb-4 border-b-primary">
        <ol class="breadcrumb breadcrumb_custom">
            <li class="breadcrumb-item"><a href="?url=home">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tra cứu đơn hàng</li>
        </ol>
    </div>
</nav>
<div class="auth register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <div class="login_container">
                    <div class="row">
                        <form class="form col" action="?url=tracking/lookup" method="POST">
                            <div class="form__title mb-3">
                                <h1>Kiểm tra thông tin & tình trạng vận chuyển</h1>
                            </div>
                            <div class="form-group ">
                                <input type="text" placeholder="Số điện thoại (Bắt buộc)" name="phone">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Mã đơn hàng (Bắt buộc)" name="order_id">
                            </div>
                            <span style="color:red; margin-left:8px; display: <?php echo $result = !empty($error) ? '' : 'none' ?>;"><?php echo $result = !empty($error) ? $error : '' ?></span>
                            <div class="form__btn pt-4">
                                <button type="submit">Kiểm tra</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php if (!empty($order)) { ?>
    <div class="container">
        <div class="bill">
            <div class="bill__header">
                <div class="btn-status 
                                <?php
                                echo $status = $order['status_order'] == 1 ? 'btn-status--pending' : '';
                                echo $status = $order['status_order'] == 2 ? 'btn-status--success' : '';
                                echo $status = $order['status_order'] == 3 ? 'btn-status--close' : '';
                                ?>
                                ">
                    <?php
                    echo $status = $order['status_order'] == 1 ? 'Đơn hàng mới' : '';
                    echo $status = $order['status_order'] == 2 ? 'Đã duyệt' : '';
                    echo $status = $order['status_order'] == 3 ? 'Đã hủy' : '';
                    ?>
                </div>
                <p>Đơn hàng <b>#<?php echo $order['id'] ?></b></p>
            </div>
            <div class="bill__content">
                <div class="bill__top">
                    <div class="bill__info">
                        <div class="customer__info">
                            <p class="customer__position">Thông tin người đặt</p>
                            <p class="customer__name">- <?php echo $order['name']  ?></p>
                            <p class="customer__phone">- <?php echo $order['phone']  ?></p>
                        </div>
                        <div class="bill__receive">
                            <div class="receive__title">Thông tin người nhận</div>
                            <div class="receive__name"><?php echo $order['name_receive'] ?></div>
                            <div class="receive__phone"><?php echo $order['phone_receive'] ?></div>
                            <div class="receive__address"><?php echo $order['address_receive'] ?></div>
                            <div class="receive__note"><?php echo $order['note'] ?></div>
                        </div>
                    </div>
                    <div class="bill__date">
                        <p>
                            Thời gian -
                            <?php $date = strtotime($order['order_date']);
                            $date = date('H:i:s d/m/Y', $date);
                            echo $date
                            ?>
                        </p>
                        <p>
                            Phương thức giao hàng -
                            <?php echo $order['delivery'] ?>
                        </p>
                        <p>
                            Phương thức thanh toán -
                            <?php echo $payment['name'] ?>
                        </p>
                        <p>
                            Trạng thái đơn hàng -
                            <?php
                            echo $status = $order['status_order'] == 1 ? 'Chờ xác nhận' : '';
                            echo $status = $order['status_order'] == 2 ? 'Đơn hàng đã được duyệt' : '';
                            echo $status = $order['status_order'] == 3 ? 'Đơn hàng đã bị hủy' : '';
                            echo $status = $order['status_order'] == 4 ? 'Đang chuẩn bị hàng' : '';
                            echo $status = $order['status_order'] == 5 ? 'Đang giao hàng' : '';
                            echo $status = $order['status_order'] == 6 ? 'Giao Hàng thành công' : '';
                            ?>
                        </p>
                    </div>
                </div>
                <div class="bill__main">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            while ($orderDetail = mysqli_fetch_array($orderDetails)) {
                                $total += $orderDetail['quantity'] * $orderDetail['price'];
                            ?>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td><?php echo $orderDetail['name'] ?></td>
                                    <td class="text-right"><?php echo $orderDetail['quantity'] ?></td>
                                    <td class="text-right"><?php echo number_format($orderDetail['price'], 0, '.', '.');  ?>đ</td>
                                    <td class="text-right"><?php echo number_format(($orderDetail['price'] * $orderDetail['quantity']), 0, '.', '.'); ?>đ</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="bill__bottom">
                    <p class="bill__total">Tổng tiền hàng: <?php echo number_format($total, 0, '.', '.');  ?>đ</p>
                    <span style="display: block; text-align: right;padding:8px 0 4px 0 ;">Phí vận chuyển: <?php echo number_format($total - $order_total = count($promotion) > 0 ? $order['total'] + $promotion['price'] : $order['total'], 0, '.', '.'); ?>đ</span>
                    <?php if (count($promotion) > 0) { ?>
                        <span style="display: block; text-align: right;padding:4px 0 8px 0 ;">Giảm giá: <?php echo number_format($promotion['price'], 0, '.', '.'); ?>đ</span>
                    <?php } else { ?>
                        <span style="display: block; text-align: right;padding:12px 0 ;">Giảm giá: 0đ</span>
                    <?php } ?>
                    <p class="bill__total">Tổng thanh toán: <?php echo number_format($order['total'], 0, '.', '.');  ?></p>
                </div>
            </div>
            <div class="bill__footer">
            </div>
        </div>
    </div>
<?php } ?>