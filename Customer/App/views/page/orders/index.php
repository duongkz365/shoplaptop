<nav aria-label="breadcrumb">
    <div class="container pt-3 mb-4 border-b-primary">
        <ol class="breadcrumb breadcrumb_custom">
            <li class="breadcrumb-item"><a href="?url=home">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đơn hàng đã mua</li>
        </ol>
    </div>
</nav>
<div class="cart">
    <div class="container">

        <div class="cart__container">
            <div class="cart__title">
                <h1>Thông tin đơn hàng đã mua</h1>
            </div>
            <div class="cart__table">
                <div class="table_rp">
                    <table>
                        <thead>
                            <tr>
                                <th class="width-100">ID</th>
                                <th class="width-150">Order date</th>
                                <th class="width-150">Status</th>
                                <th class="width-200">Name</th>
                                <th class="width-200">Name receive</th>
                                <th class="width-200">Phone received</th>
                                <th class="width-200">Address received</th>
                                <th class="width-200">Total</th>
                                <th class="width-150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($order = mysqli_fetch_array($orders)) { 
                            ?>
                                    <tr>
                                        <td class="text-center"><?php echo $order['id'] ?></td>
                                        <td>
                                        <?php $date = strtotime($order['order_date']);
                                            $date = date('H:i:s d/m/Y', $date);
                                            echo $date;
                                            ?>
                                        </td>
                                        <td>
                                            <p class="btn-status 
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
                                            </p>
                                        </td>
                                        <td class="width-200"><?php echo $order['name'] ?></td>
                                        <td class="width-200"><?php echo $order['name_receive'] ?></td>
                                        <td class="width-200"><?php echo $order['phone_receive'] ?></td>
                                        <td class="width-200"><?php echo $order['address_receive'] ?></td>
                                        <td class="width-200 text-right">
                                            <?php echo number_format($order['total'], 0, '.', '.');  ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($order['status_order'] == 1){ ?>
                                                <a href="?url=order/cancelOrder/<?php echo $order['id'] ?>">
                                                    Huỷ
                                                </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>