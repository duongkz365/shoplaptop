<form action="user/update/<?php echo $user['id'] ?>" class="form-wrapper" method="POST">
    <h1 class="form-title">Cập nhật nhân viên</h1>
    <div class="form-group mt-20">
        <label for="">
            Tên
            <b>(*)</b>
        </label>
        <input name="name" type="text" placeholder="Nhập tên nhân viên" value="<?php echo $user["name"] ?>">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Email
            <b>(*)</b>
        </label>
        <input name="email" type="email" placeholder="Nhập email nhân viên" value="<?php echo $user["email"] ?>">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Password
            <b>(*)</b>
        </label>
        <input name="password" type="password" placeholder="Nhập mật khẩu nhân viên">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Địa chỉ
        </label>
        <input name="address" type="text" placeholder="Nhập địa chỉ nhân viên" value="<?php echo $user["address"] ?>">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Số điện thoại
            <b>(*)</b>
        </label>
        <input name="phone" type="text" placeholder="Nhập số điện thoại nhân viên" value="<?php echo $user["phone"] ?>">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Giới tính
            <b>(*)</b>
        </label>
        <select name="gender" id="gender">
            <option value="0" <?php echo $user["gender"] == 0 ? 'selected' : '' ?>>Nam</option>
            <option value="1" <?php echo $user["gender"] == 1 ? 'selected' : '' ?>>Nữ</option>
        </select>
    </div>
    <div class=" form-button">
        <button type="submit" class="btn-action btn-action--submit">Lưu</button>
        <a href="user" class="btn-action btn-action--back">Quay lại</a>
    </div>
</form>