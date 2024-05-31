<form action="customer/create" class="form-wrapper" method="POST">
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
            BirthDay
        </label>
        <input name="birthday" type="date">
    </div>
    <div class="form-group mt-20">
        <label for="">
            Phone
        </label>
        <input name="phone" type="text">
    </div>
    <div class=" form-button">
        <button type="submit" class="btn-action btn-action--submit">Add</button>
        <a href="customer" class="btn-action btn-action--back">Cancel</a>
    </div>
</form>