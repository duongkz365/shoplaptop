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
}
