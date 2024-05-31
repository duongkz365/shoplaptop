<?php
class CustomerModel extends BaseModel
{
    const TableName = 'customers';

    public function createCustomer($data)
    {
        return $this->create(self::TableName, $data);
    }

    public function findEmail($email)
    {
        $sql = "SELECT * FROM customers WHERE Email = '${email}'";
        $result =  $this->querySql($sql);
        return mysqli_fetch_array($result);
    }

    public function findPhoneNumber($phoneNumber)
    {
        $sql = "SELECT * FROM customers WHERE phone = '${phoneNumber}'";
        $result =  $this->querySql($sql);
        return mysqli_fetch_array($result);
    }
}
