<?php
class ProductController extends BaseController
{
    private $productModel;
    private $categoryModel;
    private $commentModel;
    private $promotionModel;
    private $brandModel;
    private $specificationModel;
    private $orderModel;

    public function __construct()
    {
        $this->categoryModel = $this->model('categoryModel');
        $this->productModel = $this->model('productModel');
        $this->commentModel = $this->model('CommentModel');
        $this->promotionModel = $this->model('PromotionModel');
        $this->brandModel = $this->model('brandModel');
        $this->specificationModel = $this->model('specificationModel');
        $this->orderModel = $this->model('OrderModel');
    }

    public function sayHi()
    {
        $sql = "SELECT * FROM products WHERE status = 1";
        $categories = $this->categoryModel->getCategories();
        $brands = $this->brandModel->getBrands();

        if (isset($_GET['brand'])) {
            $brand_id = $_GET['brand'];
        }

        if (isset($_GET['category'])) {
            $category_id = $_GET['category'];
        }

        if (!empty($brand_id)) {
            $sql = "SELECT * FROM products WHERE status = 1 AND brand_id = ${brand_id}";
        }

        if (!empty($category_id)) {
            $sql = "SELECT * FROM products WHERE status = 1 AND category_id = ${category_id}";
        }

        if (!empty($brand_id) && !empty($category_id)) {
            $sql = "SELECT * FROM products WHERE status = 1 AND category_id = ${category_id} AND brand_id = ${brand_id}";
        }


        $products = $this->productModel->getProducts($sql);
        $this->view(
            'main-layout',
            [
                'page' => 'products/index',
                'pageName' => 'Shop Laptop',
                'products' => $products,
                'brands' => $brands,
                'categories' => $categories,
            ]
        );
    }

    public function viewCount($id)
    {
        $product = $this->productModel->getProduct($id);
        $this->productModel->updateProduct($id, ['view_count' => $product['view_count'] + 1]);
        header("location:?url=product/show/${id}");
    }

    public function show($id)
    {
        $customer_id = $_SESSION['customer']['id'] ?? null;
        $product = $this->productModel->getProduct($id);
        $promotions = $this->promotionModel->getPromotions();
        $category = $this->categoryModel->getCategory($product['category_id']);
        $sql = "SELECT * FROM products WHERE status = 1 AND category_id = " . $product['category_id'];
        $productByCate = $this->productModel->productByCate($sql);
        $commentByProducts = $this->commentModel->getCommentById($id);
        $averageStar = $this->commentModel->averageCommentById($id);
        $specifications = $this->specificationModel->getSpecificationById($id);

        $order = [];
        if ($customer_id) {
            $order = $this->orderModel->getOrderBuyer($customer_id, $id);
        }

        $message = '';
        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
            $message = $_SESSION['error'];
        }

        $this->view(
            'main-layout',
            [
                'page' => 'products/showProduct',
                'pageName' => $product['name'],
                'productDetail' => $product,
                'category' => $category,
                'productByCate' => $productByCate,
                'comments' => $commentByProducts,
                'promotions' => $promotions,
                'averageStar' => mysqli_fetch_array($averageStar),
                'specifications' => $specifications,
                'order' => $order,
                'message' => $message,
            ]
        );

        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
            unset($_SESSION['error']);
        }
    }


    public function ByCate($id)
    {
        $brands = $this->brandModel->getBrands();
        $category = $this->categoryModel->getCategory($id);
        $categories = $this->categoryModel->getCategories();

        $sql = "SELECT * FROM products WHERE status = 1 AND category_id = ${id}";

        if (isset($_GET['brand'])) {
            $brand_id = $_GET['brand'];
        }

        if (!empty($brand_id)) {
            $sql = "SELECT * FROM products WHERE status = 1 AND category_id = ${id} AND brand_id = ${brand_id}";
        }

        $products = $this->productModel->productByCate($sql);
        $this->view(
            'main-layout',
            [
                'page' => 'products/byCate',
                'pageName' => 'Danh mục',
                'category' => $category,
                'products' => $products,
                'categories' => $categories,
                'brands' => $brands,
            ]
        );
    }


    public function ByBrand($id)
    {
        $sql = "SELECT * FROM products WHERE status = 1 AND brand_id = ${id}";
        $brand = $this->brandModel->getBrand($id);
        $brands = $this->brandModel->getBrands();
        $categories = $this->categoryModel->getCategories();

        if (isset($_GET['category'])) {
            $category_id = $_GET['category'];
        }

        if (!empty($category_id)) {
            $sql = "SELECT * FROM products WHERE status = 1 AND category_id = ${category_id}";
        }

        $products = $this->productModel->productByBrand($sql);
        $this->view(
            'main-layout',
            [
                'page' => 'products/byBrand',
                'pageName' => 'Hãng',
                'brand' => $brand,
                'brands' => $brands,
                'products' => $products,
                'categories' => $categories,
            ]
        );
    }

    public function search()
    {
        $name = $_POST['name'];
        $products = $this->productModel->searchProduct($name);
        if ($name) {
            $this->view(
                'main-layout',
                [
                    'page' => 'products/searchProduct',
                    'pageName' => 'Kết quả tìm kiếm',
                    'products' => $products
                ]
            );
        } else {
            header("location:?url=/product/sayHi");
        }
    }
}
