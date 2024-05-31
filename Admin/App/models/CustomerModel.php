<?php
class CustomerModel extends BaseModel
{
    const TableName = 'customers';

    public function getCustomers()
    {
        return $this->getAll(self::TableName);
    }

    public function getCustomer($id)
    {
        return $this->find(self::TableName, $id);
    }


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

    public function updateCustomer($id, $data)
    {
        return $this->update(self::TableName, $id, $data);
    }

    public function deleteCustomer($id)
    {
        return $this->destroy(self::TableName, $id);
    }

    public function searchCustomers($name)
    {
        return $this->searchName(self::TableName, $name);
    }



    public function totalCustomer()
    {
        $sql = "SELECT COUNT(*) as customerNumber FROM customers WHERE customers.status = 1";
        $result = mysqli_fetch_array($this->querySql($sql));
        return $result;
    }
}
