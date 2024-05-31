<?php
class HomeController extends BaseController
{
    private $productModel;
    private $categoryModel;
    private $brandModel;

    public function __construct()
    {
        $this->productModel = $this->model('productModel');
        $this->categoryModel = $this->model('categoryModel');
        $this->brandModel = $this->model('brandModel');
    }

    public function sayHi()
    {
        $categories = $this->categoryModel->getCategories();
        $products = $this->productModel->getProductAll(['ID', 'DESC'], 5);
        $productHots = $this->productModel->getProductHot();
        $productViewCount = $this->productModel->getProductViewCount();
        $brands = $this->brandModel->getBrands();
        $this->view(
            'main-layout',
            [
                'page' => 'home/index',
                'pageName' => 'Shop Laptop',
                'categories' => $categories,
                'products' => $products,
                'productHots' => $productHots,
                'brands' => $brands,
                'productViewCount' => $productViewCount
            ]
        );
    }
}
