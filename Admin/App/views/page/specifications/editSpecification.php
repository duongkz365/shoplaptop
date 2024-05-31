<form action="product/updateSpecification/<?php echo $specification['id'] ?>" class="form-wrapper" method="POST">
    <div class="form-container">
        <div class="form-group">
            <label for="">
                Key
            </label>
            <input type="text" name="key" value="<?php echo $specification['key'] ?>">
        </div>
    </div>
    <div class="form-group mt-20">
        <label for="">
            Value
        </label>
        <input type="text" name="value" value="<?php echo $specification['value'] ?>">
    </div>
    <div class=" form-button">
        <button type="submit" class="btn-action btn-action--submit">Submit</button>
        <a href="product/edit/<?php echo $specification['product_id'] ?>" class="btn-action btn-action--back">Cancel</a>
    </div>
</form>