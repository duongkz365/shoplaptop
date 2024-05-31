<?php
class CategoryController extends BaseController
{
    private $productModel;
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = $this->model('categoryModel');
        $this->productModel = $this->model('productModel');
    }

    public function sayHi()
    {
        $categories = $this->categoryModel->getCategories();
        $products = $this->productModel->getProducts(['ID', 'DESC'], 8);
        $this->view(
            'main-layout',
            [
                'page' => 'categories/index',
                'pageName' => 'Shop Laptop',
                'categories' => $categories,
                'products' => $products,
            ]
        );
    }
}
