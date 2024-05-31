<form action="product/updateQuantity/<?php echo $product['id'] ?>" class="form-wrapper" method="POST">
    <div class="form-container">
        <div class="form-group">
            <label for="">
                Số lượng
            </label>
            <input value="<?php echo $product['quantity'] ?>" type="number" name="quantity">
        </div>
    </div>
    <div class=" form-button">
        <button type="submit" class="btn-action btn-action--submit">Submit</button>
        <a href="product" class="btn-action btn-action--back">Cancel</a>
    </div>
</form>