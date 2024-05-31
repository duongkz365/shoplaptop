<div class="table-wrapper">
    <div class="table__header">
        <h1 class="table__title">Category</h1>
        <div class="table__right">
            <a href="category/add" class="btn btn--add">
                <i class="fa-solid fa-plus"></i>
                Add Caregory
            </a>
        </div>
    </div>

    <div class="table-container">
        <table class="content-table">
            <thead>
                <tr>
                    <th class="width-100">ID</th>
                    <th class="width-250">Name</th>
                    <th class="width-250">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 1;
                foreach ($categories as $category) { ?>
                    <tr>
                        <td class='width-100 text-center'> <?php echo $number;
                                                            $number++ ?></td>
                        <td class='width-250 '> <?php echo $category['name'] ?> </td>
                        <td class='width-250 text-center'>
                            <a href='category/edit/<?php echo $category['id'] ?>' class='btn-action btn-action--edit'>
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a class="btn-action btn-action--delete" onclick="handleNotification(<?php echo $category['id'] ?>, 'Bạn có chắc muốn xóa danh mục sản phẩm này ?','category/delete');">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>