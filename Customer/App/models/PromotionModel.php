<?php
class PromotionModel extends BaseModel
{
    const TableName = 'promotions';

    public function getPromotions()
    {
        return $this->getAll(self::TableName);
    }

    public function getPromotion($id)
    {
        return $this->find(self::TableName, $id);
    }

    public function getPromotionName($code)
    {
        $sql = "SELECT * FROM promotions WHERE code = '${code}' AND status = 1";
        return  $this->querySql($sql);
    }
}
