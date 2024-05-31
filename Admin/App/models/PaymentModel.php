<?php
class PaymentModel extends BaseModel
{
    const TableName = 'payments';

    public function getPayments()
    {
        return $this->getAll(self::TableName);
    }

    public function getPayment($id)
    {
        return $this->find(self::TableName, $id);
    }


    public function searchPayments($name)
    {
        return $this->searchName(self::TableName, $name);
    }

    public function createPayment($data)
    {
        return $this->create(self::TableName, $data);
    }

    public function updatePayment($id, $data)
    {
        return $this->update(self::TableName, $id, $data);
    }

    public function deletePayment($id)
    {
        return $this->destroy(self::TableName, $id);
    }
}
