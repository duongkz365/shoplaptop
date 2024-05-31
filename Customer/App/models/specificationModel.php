<?php
class SpecificationModel extends BaseModel
{
    const TableName = 'specifications';

    public function getSpecificationById($id)
    {
        $sql = "SELECT * FROM specifications WHERE status = 1 AND  product_id = ${id}";
        return $this->querySql($sql);
    }
}
