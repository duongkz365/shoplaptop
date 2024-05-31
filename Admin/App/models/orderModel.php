<?php
class OrderModel extends BaseModel
{
    const TableName = 'orders';
    public function getOrders()
    {
        $sql = "SELECT orders.*, customers.name FROM orders, customers 
        WHERE orders.customer_id = customers.id ORDER BY orders.id DESC";
        return $this->querySql($sql);
    }

    public function getOrderById($id)
    {
        return $this->find(self::TableName, $id);
    }

    public function searchOrders($name)
    {
        $sql = "SELECT orders.*, customers.name FROM orders, customers 
        WHERE orders.customer_id = customers.id
        AND customers.name like '%${name}%'
        ";
        return $this->querySql($sql);
    }

    public function getOrderApprover($id)
    {
        $sql = "SELECT orders.* FROM orders
        WHERE orders.approver = ${id}";
        return $this->querySql($sql);
    }

    public function getOrderDetails($id)
    {
        $sql = "SELECT order_details.*, products.name
        FROM order_details, products 
        WHERE order_details.product_id = products.id 
        AND order_details.order_id = ${id}";
        return $this->querySql($sql);
    }

    public function updateOrder($id, $data)
    {
        return $this->update(self::TableName, $id, $data);
    }

    public function totalOrderNew()
    {
        $sql = "SELECT COUNT(*) as orderNumber FROM orders WHERE orders.status_order = 1";
        $result = mysqli_fetch_array($this->querySql($sql));;
        return $result;
    }

    public function totalPrice()
    {
        $sql = "SELECT SUM(total) as totalPrice FROM orders WHERE orders.status_order = 2";
        $result = mysqli_fetch_array($this->querySql($sql));;
        return $result;
    }
}
