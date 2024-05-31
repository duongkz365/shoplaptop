<form action="product/createSpecification/<?php echo $id ?>" class="form-wrapper" method="POST">
    <div class="form-container">
        <div class="form-group">
            <label for="">
                Key
            </label>
            <input type="text" name="key">
        </div>
    </div>
    <div class="form-group mt-20">
        <label for="">
            Value
        </label>
        <input type="text" name="value">
    </div>
    <div class=" form-button">
        <button type="submit" class="btn-action btn-action--submit">Add</button>
        <a href="product/edit/<?php echo $id ?>" class="btn-action btn-action--back">Cancel</a>
    </div>
</form>