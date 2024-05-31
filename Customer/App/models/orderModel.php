<?php
class orderModel extends BaseModel
{
    const TableName = 'orders';

    public function createOrder($data)
    {
        $this->create(self::TableName, $data);
        return mysqli_insert_id($this->connect);
    }

    public function getOrder($id)
    {
        $order = $this->find(self::TableName, $id);
        return $order;
    }

    public function getOrders($customerID)
    {
        $sql = "SELECT *, orders.id as id FROM orders, customers WHERE orders.customer_id = ${customerID} 
            AND orders.customer_id = customers.id ORDER BY orders.id DESC";
        return $this->querySql($sql);
    }

    public function getOrderBuyer($customerID, $productID)
    {
        $sql = "SELECT *, orders.id as id FROM orders,order_details, customers WHERE orders.customer_id = customers.id AND orders.id = order_details.order_id AND status_order = 2 AND orders.customer_id = ${customerID} AND product_id = ${productID}";
        return $this->querySql($sql);
    }

    public function getOrderbyCustomer($id)
    {
        $sql = "SELECT orders.ID FROM orders, customers WHERE orders.CustomerID = customers.ID AND orders.CustomerID = ${id}";
        return $this->querySql($sql);
    }

    public function checkPromotion($customer_id, $promotion_id)
    {
        $sql = "SELECT promotions.id, promotions.code, promotions.price FROM orders, promotions WHERE orders.promotion_id = promotions.id AND orders.customer_id = ${customer_id} AND orders.promotion_id=${promotion_id}";
        return $this->querySql($sql);
    }

    public function getOrderByPhoneCustomer($phone, $order_id)
    {
        $sql = "SELECT orders.*, customers.*, orders.id as order_id, customers.id as customer_id FROM orders, customers WHERE orders.customer_id = customers.id AND orders.id = ${order_id} AND customers.phone ='${phone}'";
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
}
