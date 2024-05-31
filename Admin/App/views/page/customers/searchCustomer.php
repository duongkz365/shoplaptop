<div class="table-wrapper">
    <div class="table__header">
        <h1 class="table__title">Search results</h1>
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
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 1;
                while ($customer = mysqli_fetch_array($customers)) { ?>
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

                        <!-- <td class="width-150 text-center">
                            <a href="#!" class="btn-action btn-action--view">Xem chi tiết</a>
                        </td> -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>