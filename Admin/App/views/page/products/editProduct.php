<form action="product/update/<?php echo $product['id'] ?>" class="form-wrapper" method="POST" enctype="multipart/form-data">
    <div class="form">
        <div class="form-left">
            <div class="form-group ">
                <label for="file">
                    <div class="form-img">
                        <img id="blah" src="../product_img/<?php echo $product['img'] ?>" alt="">
                    </div>
                </label>
                <label for="file" class="input-file">Avatar</label>
                <input type="file" id="file" style="display: none;" name="file" accept="image/*">
            </div>
            <div class="form-group">
                <label for="">
                    Serial
                </label>
                <input type="text" name="serial" value="<?php echo $product['serial'] ?>">
            </div>
            <div class="form-group">
                <label for="">
                    Price
                </label>
                <input type="text" name="price" value="<?php echo $product['price'] ?>">
            </div>
            <div class="form-group">
                <label for="">
                    Promotional price
                </label>
                <input type="text" name="sale_price" value="<?php echo $product['sale_price'] ?>">
            </div>
            <div class="form-group">
                <label for="">
                    List product
                </label>
                <input type="file" name="listproduct[]" accept="image/*" multiple>
            </div>
            <div class="form-group ">
                <?php foreach (explode(",", $product['list_img']) as $img) {
                ?>
                    <label>
                        <div class="form-img">
                            <img id="blah" src="../product_img/<?php echo $img ?>" alt="">
                        </div>
                    </label>
                <?php } ?>
            </div>
        </div>
        <div class=" form-right">
            <div class="form-container">
                <div class="form-group">
                    <label for="">
                        Name
                    </label>
                    <input type="text" name="name" value="<?php echo $product['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="">
                        Category
                    </label>
                    <select name="category_id">

                        <option selected disabled value=" ">-- Chọn --</option>
                        <?php foreach ($categories as $category) { ?>
                            <option <?php echo $selected = $category['id'] == $product['category_id'] ? "selected" : "" ?> value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                        <?php } ?>

                    </select>
                </div>

            </div>
            <div class="form-container">
                <div class="form-group">
                    <label for="">
                        Brand
                    </label>
                    <select name="brand_id">
                        <option selected disabled value=" ">-- Chọn --</option>
                        <?php foreach ($brands as $brand) { ?>
                            <option <?php echo $selected = $brand['id'] == $product['brand_id'] ? "selected" : "" ?> value="<?php echo $brand['id'] ?>"><?php echo $brand['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">
                        Hot
                    </label>
                    <select name="hot">
                        <option <?php echo $selected = $product['hot'] == 1 ? "selected" : "" ?> value="1">Có</option>
                        <option <?php echo $selected = $product['hot'] == 0 ? "selected" : "" ?> value="0">Không</option>
                    </select>
                </div>
            </div>
            <div class="form-group d-block">
                <label for="">
                    Description
                </label>
                <textarea name='description' id='ckeditor'><?php echo $product['description'] ?></textarea>
            </div>
        </div>
    </div>
    <div class="form-button">
        <button type="submit" class="btn-action btn-action--submit">Submit</button>
        <a href="product" class="btn-action btn-action--back">Cancel</a>
    </div>
</form>
<div class="table-wrapper">
    <div class="table__header">
        <h1 class="table__title">specifications</h1>
        <div class="table__right">
            <a href="product/addSpecification/<?php echo $product['id']  ?>" class="btn btn--add">
                <i class="fa-solid fa-plus"></i>
                Add Specifications
            </a>
        </div>
    </div>

    <div class="table-container">
        <table class="content-table">
            <thead>
                <tr>
                    <th class="width-100">ID</th>
                    <th class="width-150">Key</th>
                    <th class="width-200">Value</th>
                    <th class="width-250">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                while ($row = mysqli_fetch_array($specification)) {
                    $total += 1;
                ?>
                    <tr>
                        <td class="width-100"><?php echo $total ?></td>
                        <td class="width-150"><?php echo $row['key'] ?></td>
                        <td class="width-150"><?php echo $row['value'] ?></td>
                        <td class="width-250 text-center">
                            <a href="product/editSpecification/<?php echo $row['id'] ?>" class="btn-action btn-action--edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a class="btn-action btn-action--delete" onclick="handleNotification(<?php echo $row['id'] ?>, 'Bạn có chắc muốn xóa thông số kĩ thuật này phẩm này ?','product/deleteSpecification/<?php echo $row['id'] ?>');">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    // Preview Img Input
    const fileValue = document.getElementById('file');
    fileValue.onchange = evt => {
        const [file] = fileValue.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }

    ClassicEditor.create(document.querySelector('#ckeditor')).catch((error) => {
        console.error(error);
    });

    ClassicEditor.create(document.querySelector('#ckeditor1')).catch((error) => {
        console.error(error);
    });
</script>