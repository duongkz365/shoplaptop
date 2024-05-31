<div class="table-wrapper">
    <div class="table__header">
        <h1 class="table__title">Promotion</h1>
        <div class="table__right">
            <a href="promotion/add" class="btn btn--add">
                <i class="fa-solid fa-plus"></i>
                Add Promotion
            </a>
        </div>
    </div>
    <div class="table-container">
        <table class="content-table">
            <thead>
                <tr>
                    <th class="width-100">ID</th>
                    <th class="width-250">Code</th>
                    <th class="width-320">Price</th>
                    <th class="width-320">Name promotion</th>
                    <th class="width-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 1;
                foreach ($promotions as $promotion) {
                ?>
                    <tr>
                        <td class="width-100 text-center">
                            <?php
                            echo $number;
                            $number++
                            ?>
                        </td>
                        <td class="width-250"><?php echo $promotion['code'] ?> </td>
                        <td class="width-320 ext-right"><?php echo number_format($promotion['price']) ?>đ</td>
                        <td class="width-320"><?php echo $promotion['name'] ?></td>
                        <td class="width-200 text-center">
                            <a href="promotion/edit/<?php echo $promotion['id'] ?>" class="btn-action btn-action--edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a class="btn-action btn-action--delete" onclick="handleNotification(<?php echo $promotion['id'] ?>, 'Bạn có chắc muốn xóa khuyến mãi này ?','promotion/delete');">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>