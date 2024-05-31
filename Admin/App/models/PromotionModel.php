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

    public function searchPromotions($name)
    {
        return $this->searchName(self::TableName, $name);
    }


    public function createPromotion($data)
    {
        return $this->create(self::TableName, $data);
    }

    public function updatePromotion($id, $data)
    {
        return $this->update(self::TableName, $id, $data);
    }

    public function deletePromotion($id)
    {
        return $this->destroy(self::TableName, $id);
    }
}
