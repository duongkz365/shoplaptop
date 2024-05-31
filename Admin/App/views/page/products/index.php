<div class="table-wrapper">
    <div class="table__header">
        <h1 class="table__title">Product</h1>
        <div class="table__right">
            <a href="product/add" class="btn btn--add">
                <i class="fa-solid fa-plus"></i>
                Add Product
            </a>
        </div>
    </div>

    <div class="table-container">
        <table class="content-table">
            <thead>
                <tr>
                    <th class="width-100">ID</th>
                    <th class="width-150">Hot</th>
                    <th class="width-150">Quantity</th>
                    <th class="width-200">Image</th>
                    <th class="width-320">Name</th>
                    <th class="width-150">Category</th>
                    <th class="width-150">Price</th>
                    <th class="width-250">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $number = 1;
                while ($product = mysqli_fetch_array($products)) { ?>
                    <tr>
                        <td class="width-100 text-center">
                            <?php echo $number;
                            $number++; ?>
                        </td>
                        <td class="width-150 text-center"><?php echo $hot = $product['hot'] == 1 ? 'Có' : 'Không' ?></td>
                        <td class="width-150 text-center">
                            <?php echo $product['quantity'] ?>
                            <a style="margin-left: 8px; text-decoration: none;" href="product/editQuantity/<?php echo $product['id'] ?>" class="btn-status btn-status--close">
                                Update
                            </a>
                        </td>
                        <td class="width-100"> <img src="../product_img/<?php echo $product['img'] ?>" alt=""></td>
                        <td class=""><?php echo $product['name'] ?> </td>
                        <td class="width-150"><?php echo $product['categoryName'] ?> </td>
                        <td class="width-150 text-right">
                            <b style="text-decoration: line-through;">
                                <?php echo number_format($product['price'], 0, '.', '.');  ?>
                            </b>
                            <br />
                            <?php echo number_format($product['sale_price'], 0, '.', '.');  ?>
                            <br />
                        </td>

                        <td class="width-250 text-center">
                            <a href="product/edit/<?php echo $product['id'] ?>" class="btn-action btn-action--edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a class="btn-action btn-action--delete" onclick="handleNotification(<?php echo $product['id'] ?>, 'Bạn có chắc muốn xóa sản phẩm này ?','product/delete');">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>