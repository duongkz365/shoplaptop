<form action="customer/update/<?php echo $customer['id'] ?>" class="form-wrapper" method="POST">
    <div class="form-group mt-20">
        <label for="">
            Name
        </label>
        <input name="name" type="text" placeholder="Nhập tên nhân viên" value="<?php echo $customer["name"] ?>">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Email
            <b>(*)</b>
        </label>
        <input name="email" type="email" value=" <?php echo $customer["email"] ?>">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Password
            <b>(*)</b>
        </label>
        <input name="password" type="password" placeholder="Đặt lại mất khẩu">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Address
        </label>
        <input name="address" type="text" value="<?php echo $customer["address"] ?>">
    </div>
    <div class="form-group mt-20">
        <label for="">
            BirthDay
        </label>
        <input name="birthday" type="text" value=" <?php echo $customer["birthday"] ?>">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Phone
            <b>(*)</b>
        </label>
        <input name="phone" type="text" placeholder="Nhập số điện thoại nhân viên" value="<?php echo $customer["phone"] ?>">
    </div>
    <div class=" form-button">
        <button type="submit" class="btn-action btn-action--submit">Lưu</button>
        <a href="customer" class="btn-action btn-action--back">Quay lại</a>
    </div>
</form>