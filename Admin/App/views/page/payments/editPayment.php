<form action="payment/update/<?php echo $payment['id'] ?>" class="form-wrapper" method="POST">
    <div class="form-group">
        <label for="">
            Name
        </label>
        <input name="name" type="text" value="<?php echo $payment["name"] ?>">
    </div>
    <div class=" form-button">
        <button type="submit" class="btn-action btn-action--submit">Submit</button>
        <a href="payment" class="btn-action btn-action--back">Cancel</a>
    </div>
</form>