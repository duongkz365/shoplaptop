<form action="product/create" class="form-wrapper" method="POST" enctype="multipart/form-data">
    <div class="form">
        <div class="form-left">
            <div class="form-group ">
                <label for="file">
                    <div class="form-img">
                        <img id="blah" src="./public/img/img.png" alt="">
                    </div>
                </label>
                <label for="file" class="input-file">Avatar</label>
                <input type="file" id="file" style="display: none;" name="file" accept="image/*">
            </div>
            <div class="form-group">
                <label for="">
                    Serial
                </label>
                <input type="text" name="serial">
            </div>
            <div class="form-group">
                <label for="">
                    Price
                </label>
                <input type="text" name="price">
            </div>
            <div class="form-group">
                <label for="">
                    Promotional price
                </label>
                <input type="text" name="sale_price">
            </div>
            <div class="form-group">
                <label for="">
                    List product
                </label>
                <input type="file" name="listproduct[]" accept="image/*" multiple>
            </div>
        </div>
        <div class="form-right">
            <div class="form-container">
                <div class="form-group">
                    <label for="">
                        Name
                    </label>
                    <input type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="">
                        Category
                    </label>
                    <select name="category_id">
                        <option selected disabled value=" ">-- Chọn --</option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
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
                            <option value="<?php echo $brand['id'] ?>"><?php echo $brand['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">
                        Hot
                    </label>
                    <select name="hot">
                        <option disabled>-- Chọn --</option>
                        <option selected value="0">Không</option>
                        <option value="1">Có</option>
                    </select>
                </div>
            </div>
            <div class="form-group d-block">
                <label for="">
                    Description
                </label>
                <textarea name='description' id='ckeditor'></textarea>
            </div>
        </div>
    </div>
    <div class="form-button">
        <button type="submit" class="btn-action btn-action--submit">Add</button>
        <a href="product" class="btn-action btn-action--back">Cancel</a>
    </div>
</form>
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