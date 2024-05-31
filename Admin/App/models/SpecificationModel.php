<?php
class SpecificationModel extends BaseModel
{
    const TableName = 'specifications';

    public function getSpecificationById($id)
    {
        $sql = "SELECT * FROM specifications WHERE status = 1 AND  product_id = ${id}";
        return $this->querySql($sql);
    }

    public function createSpecification($data)
    {
        return $this->create(self::TableName, $data);
    }

    public function findSpecification($id)
    {
        return $this->find(self::TableName, $id);
    }

    public function updateSpecification($id, $data)
    {
        return $this->update(self::TableName, $id, $data);
    }

    public function deleteSpecification($id)
    {
        $data = ['status' => 0];
        return $this->update(self::TableName, $id, $data);
    }
}
