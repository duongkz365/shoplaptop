<?php
class ProductModel extends BaseModel
{
    const TableName = 'products';

    public function getProducts()
    {
        return $this->getAll(self::TableName);
    }

    public function getPropertyProducts()
    {
        $sql = " SELECT products.*, categories.name as categoryName 
        FROM products, categories 
        WHERE products.status = 1 
        AND products.category_id = categories.id";

        return $this->querySql($sql);
    }

    public function getProduct($id)
    {
        return $this->find(self::TableName, $id);
    }

    public function createProduct($data)
    {
        return $this->create(self::TableName, $data);
    }

    public function getProductsByCategory($CateID)
    {
        $sql = "SELECT * FROM products WHERE products.category_id = ${CateID} AND products.status = 1";
        return $this->querySql($sql);
    }

    public function getProductsByBrand($BrandID)
    {
        $sql = "SELECT * FROM products WHERE products.brand_id = ${BrandID} AND products.status = 1";
        return $this->querySql($sql);
    }

    public function getProductsBySupplier($SupplerID)
    {
        $sql = "SELECT * FROM products WHERE products.supplier_id = ${SupplerID} AND products.status = 1";
        return $this->querySql($sql);
    }

    public function updateProduct($id, $data)
    {
        return $this->update(self::TableName, $id, $data);
    }

    public function searchProduct($name)
    {
        $sql = " SELECT products.*, categories.name as categoryName 
        FROM products, categories 
        WHERE products.status = 1 
        AND categories.status = 1 
        AND products.category_id = categories.id
        AND products.name like '%${name}%'";
        return $this->querySql($sql);
    }

    public function deleteProduct($id)
    {
        return $this->destroy(self::TableName, $id);
    }

    public function deleteProductByCategory($CateID)
    {
        $sql = "UPDATE products 
        SET products.status = 0 
        Where products.CateID =${CateID} 
        AND products.status = 1";
        return $this->querySql($sql);
    }

    public function totalProduct()
    {
        $sql = "SELECT COUNT(*) as productNumber FROM products WHERE products.status = 1";
        $result = mysqli_fetch_array($this->querySql($sql));;
        return $result;
    }
}
