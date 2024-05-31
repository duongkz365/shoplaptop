<?php
class BrandModel extends BaseModel
{
    const TableName = 'brands';

    public function getBrands()
    {
        return $this->getAll(self::TableName);
    }

    public function getBrand($id)
    {
        return $this->find(self::TableName, $id);
    }
}
