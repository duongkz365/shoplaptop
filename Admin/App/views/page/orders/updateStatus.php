<form action="order/updateStatus/<?php echo $order['id'] ?>" class="form-wrapper" method="POST">
    <div class="form-container">
        <div class="form-group">
            <label for="">
                Trạng thái đơn hàng
            </label>
            <select name="order_status" id="">
                <option selected disabled>-- Chọn --</option>
                <option value="4">Đang chuẩn bị hàng</option>
                <option value="5">Đang giao hàng</option>
                <option value="6">Giao hàng thành công</option>
            </select>
        </div>
    </div>
    <div class=" form-button">
        <button type="submit" class="btn-action btn-action--submit">Submit</button>
        <a href="order/show/<?php echo $order['id'] ?>" class="btn-action btn-action--back">Cancel</a>
    </div>
</form>