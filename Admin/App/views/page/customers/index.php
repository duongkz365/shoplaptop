<div class="table-wrapper">
    <div class="table__header">
        <h1 class="table__title">Customers</h1>
        <div class="table__right">
            <a href="customer/add" class="btn btn--add">
                <i class="fa-solid fa-plus"></i>
                Add Customer
            </a>
        </div>
    </div>
    <div class="table-container">
        <table class="content-table">
            <thead>
                <tr>
                    <th class="width-100">ID</th>
                    <th class="width-150">Name</th>
                    <th class="width-150">Birthday</th>
                    <th class="width-150">Phone</th>
                    <th class="width-250">Email</th>
                    <th class="width-320">Address</th>
                    <th class="width-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 1;
                foreach ($customers as $customer) { ?>
                    <tr>
                        <td class="width-100 text-center">
                            <?php echo $number;
                            $number++ ?>
                        </td>
                        <td class="width-150"> <?php echo $customer['name'] ?> </td>
                        <td class="width-150 text-center">
                            <?php
                            $date = strtotime($customer['birthday']);
                            $date = date('d/m/Y', $date);
                            echo $date;
                            ?>
                        </td>
                        <td class="width-150 text-center"> <?php echo $customer['phone'] ?></td>
                        <td class="width-250"><?php echo $customer['email'] ?></td>
                        <td class="width-320"><?php echo $customer['address'] ?></td>
                        <td class="width-200 text-center">
                            <a href="customer/edit/<?php echo $customer['id'] ?>" class="btn-action btn-action--edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a class="btn-action btn-action--delete" onclick="handleNotification(<?php echo $customer['id'] ?>, 'Bạn có chắc muốn xóa khách hàng này không?','customer/delete');">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>