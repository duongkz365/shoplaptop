<?php
class orderDetailModel extends BaseModel
{
    const TableName = 'order_details';

    public function createOrderDetail($sql)
    {
        return $this->querySql($sql);
    }

    public function getOrderDetailByOrder($id)
    {
        $sql = "SELECT * fROM order_details WHERE order_id = ${id}";
        return $this->querySql($sql);
    }
}
