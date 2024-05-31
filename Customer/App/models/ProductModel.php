<?php
class ProductModel extends BaseModel
{
    const TableName = 'products';

    public function getProducts($sql)
    {
        return $this->querySql($sql);
    }

    public function getProductAll($order, $limit)
    {
        return $this->getAll(self::TableName, ['*'], $order, $limit);
    }

    public function getProduct($id)
    {
        return $this->find(self::TableName, $id);
    }


    public function productByCate($sql)
    {
        return $this->querySql($sql);
    }


    public function productByBrand($sql)
    {
        return $this->querySql($sql);
    }

    public function productByCateLimit($cateID, $limit)
    {
        $sql = "SELECT * FROM products WHERE status = 1 AND category_id = ${cateID} LIMIT ${limit}";
        return $this->querySql($sql);
    }

    public function getProductHot()
    {
        $sql = "SELECT * FROM products WHERE status = 1 AND Hot = 1 limit 5";
        return $this->querySql($sql);
    }

    public function getProductViewCount()
    {
        $sql = "SELECT * FROM products WHERE status = 1 AND view_count >= 50 limit 5";
        return $this->querySql($sql);
    }



    public function searchProduct($name)
    {
        $sql = "SELECT * FROM products WHERE products.Name like '%${name}%' AND products.status = 1";
        return  $this->querySql($sql);
    }

    public function updateProduct($id, $data)
    {
        return $this->update(self::TableName, $id, $data);
    }
}
