<div class="table-wrapper">
    <div class="table__header">
        <h1 class="table__title">Search results</h1>
    </div>

    <div class="table-container">
        <table class="content-table">
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
                    <th class="width-200">Confirm</th>
                    <th class="width-150">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = mysqli_fetch_array($orders)) { ?>
                    <tr>
                        <td class="width-50 text-center">#<?php echo $order['id'] ?></td>
                        <td class="width-150 text-center">
                            <?php $date = strtotime($order['order_date']);
                            $date = date('H:i:s d/m/Y', $date);
                            echo $date;
                            ?>
                        </td>
                        <td class="width-150">
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
                            <?php echo number_format($order['total'], 0, '.', '.');  ?></td>
                        <td class="width-200 text-center">
                            <p style="display:<?php echo $display = $order['status_order'] == 1 ? '' : 'none' ?>">
                                <a href="order/accept/<?php echo $order['id'] ?>" class="btn-action btn-action--accept">
                                    <i class="fa-solid fa-check"></i>
                                </a>
                                <a href="order/destroy/<?php echo $order['id'] ?>" class="btn-action btn-action--destroy">
                                    <i class="fa-solid fa-xmark"></i>
                                </a>
                            </p>
                            <p style="display:<?php echo $display = $order['status_order'] != 1 ? '' : 'none' ?>">
                                <a class="btn-action btn-action--disable">
                                    <i class="fa-solid fa-xmark"></i>
                                </a>
                            </p>
                        </td>
                        <td class="width-150 text-center">
                            <a href="order/show/<?php echo $order['id'] ?>" class="btn-action btn-action--view">Xem chi tiết</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>