<form action="comment/update/<?php echo $comment['id'] ?>" class="form-wrapper" method="POST">
    <h1 class="form-title">Cập nhật nhân viên</h1>
    <div class="form-group mt-20">
        <label for="">
            Email
        </label>
        <input name="email" type="email" value="<?php echo $comment["email"] ?>">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Content
        </label>
        <input name="content" type="text" value="<?php echo $comment["content"] ?>">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Đánh giá
        </label>
        <select name="rate">
            <option value="1" <?php echo $comment["rate"] == 1  ? 'selected' : '' ?>>1 Sao</option>
            <option value="2" <?php echo $comment["rate"] == 2 ? 'selected' : '' ?>>2 Sao</option>
            <option value="3" <?php echo $comment["rate"] == 3 ? 'selected' : '' ?>>3 Sao</option>
            <option value="4" <?php echo $comment["rate"] == 4 ? 'selected' : '' ?>>4 Sao</option>
            <option value="5" <?php echo $comment["rate"] == 5 ? 'selected' : '' ?>>5 Sao</option>
        </select>
    </div>
    <div class=" form-button">
        <button type="submit" class="btn-action btn-action--submit">Lưu</button>
        <a href="comment" class="btn-action btn-action--back">Quay lại</a>
    </div>
</form>