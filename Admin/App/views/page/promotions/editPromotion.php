<form action="promotion/update/<?php echo $promotion['id'] ?>" method="POST" class="form-wrapper">
    <div class="form-group mt-20">
        <label for="">
            Code
        </label>
        <input type="text" name='code' value="<?php echo $promotion['code'] ?>">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Price
        </label>
        <input type="text" name='price' value="<?php echo $promotion['price'] ?>">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Name promotion
        </label>
        <input type="text" name='name' value="<?php echo $promotion['name'] ?>">
    </div>
    <div class="form-button">
        <button type="submit" class="btn-action btn-action--submit">Submit</button>
        <a href="promotion" class="btn-action btn-action--back">Cancel</a>
    </div>
</form>