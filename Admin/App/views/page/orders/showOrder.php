<div class="bill">
    <div class="bill__header">
        <div class="btn-status 
                            <?php
                            echo $status = $order['status_order'] == 1 ? 'btn-status--pending' : '';
                            echo $status = $order['status_order'] == 2 ? 'btn-status--success' : '';
                            echo $status = $order['status_order'] == 3 ? 'btn-status--close' : '';
                            echo $status = $order['status_order'] == 4 ? 'btn-status--success' : '';
                            echo $status = $order['status_order'] == 5 ? 'btn-status--success' : '';
                            echo $status = $order['status_order'] == 6 ? 'btn-status--success' : '';
                            ?>
                            ">
            <?php
            echo $status = $order['status_order'] == 1 ? 'Đơn chờ xác nhận' : '';
            echo $status = $order['status_order'] == 2 ? 'Đã xác nhận đơn' : '';
            echo $status = $order['status_order'] == 3 ? 'Đơn hàng bị từ chối' : '';
            echo $status = $order['status_order'] == 4 ? 'Đang chuẩn bị hàng' : '';
            echo $status = $order['status_order'] == 5 ? 'Đang giao hàng' : '';
            echo $status = $order['status_order'] == 6 ? 'Giao Hàng thành công' : '';
            ?>
        </div>

        <p>Hóa đơn <b>#<?php echo $order['id'] ?></b></p>
    </div>
    <div class="bill__content">
        <div class="bill__top">
            <div class="bill__info">
                <div class="customer__info">
                    <p class="customer__position">Người gửi</p>
                    <p class="customer__name">- <?php echo $customer['name']  ?></p>
                    <p class="customer__phone">- <?php echo $customer['phone']  ?></p>
                </div>
                <div class="bill__receive">
                    <div class="receive__title">Người nhận</div>
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
            <p class="bill__total">Tổng thanh toán: <?php echo number_format($order['total'], 0, '.', '.');  ?>đ</p>

            <div class="bill__action">
                <div style="display:<?php echo $display = $order['status_order'] == 1 ? '' : 'none' ?>">
                    <a href="order/acceptShow/<?php echo $order['id'] ?>" class="btn-action btn-action--accept">
                        <i class="fa-solid fa-check"></i>
                    </a>
                    <a href="order/destroyShow/<?php echo $order['id'] ?>" class="btn-action btn-action--destroy">
                        <i class="fa-solid fa-xmark"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bill__footer">
        <a href="#" class="btn btn--share">
            <i class="fa-solid fa-paper-plane"></i>
            Send
        </a>
        <a href="#" class="btn btn--submit rounded-2px">In</a>
    </div>
</div>