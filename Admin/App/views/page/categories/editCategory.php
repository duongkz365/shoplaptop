<form action="category/update/<?php echo $category['id'] ?>" class="form-wrapper" method="POST">
    <div class="form-container mt-20">
        <div class="form-group">
            <label for="">
                Name
            </label>
            <input type="text" value="<?php echo $category['name'] ?>" name="name">
        </div>
    </div>
    <div class=" form-button">
        <button type="submit" class="btn-action btn-action--submit">Submit</button>
        <a href="category" class="btn-action btn-action--back">Cancel</a>
    </div>
</form>