<form action="user/create" class="form-wrapper" method="POST">
    <div class="form-group mt-20">
        <label for="">
            Name
        </label>
        <input name="name" type="text">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Email
        </label>
        <input name="email" type="email">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Password
        </label>
        <input name="password" type="password">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Address
        </label>
        <input name="address" type="text">
    </div>
    <div class="form-group mt-20">
        <label for="">
            phone
        </label>
        <input name="phone" type="text">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Gender
        </label>
        <select name="gender" id="gender">
            <option value="1">Nam</option>
            <option value="0">Nữ</option>
        </select>
    </div>
    <div class=" form-button">
        <button type="submit" class="btn-action btn-action--submit">Add</button>
        <a href="user" class="btn-action btn-action--back">Cancel</a>
    </div>
</form>