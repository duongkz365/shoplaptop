<?php
class ProductController extends BaseController
{
    private $productModel;
    private $categoryModel;
    private $brandModel;
    private $specificationModel;

    function __construct()
    {
        $this->productModel = $this->model('ProductModel');
        $this->categoryModel = $this->model('CategoryModel');
        $this->brandModel = $this->model('BrandModel');
        $this->specificationModel = $this->model('SpecificationModel');
    }

    function sayHi()
    {
        $products = $this->productModel->getPropertyProducts();
        $this->view(
            'main-layout',
            [
                'page' => 'products/index',
                'pageName' => 'Sản phẩm',
                'products' => $products,
            ]
        );
    }

    function add()
    {
        $categories = $this->categoryModel->getCategories();
        $brands = $this->brandModel->getBrands();
        $this->view(
            'main-layout',
            [
                'page' => 'products/addProduct',
                'pageName' => 'Thêm sản phẩm',
                'categories' => $categories,
                'brands' => $brands,
            ]
        );
    }

    function create()
    {
        $serial = $_POST['serial'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $promotionPrice = $_POST['sale_price'];
        $hot = $_POST['hot'];
        $description = $_POST['description'];
        $file = $_FILES['file'];
        $cateID = $_POST['category_id'];
        $brandID = $_POST['brand_id'];


        // format name file
        $error = [];
        $size_allow = 10;
        $fileName = $file['name'];
        $fileName = explode('.', $fileName);
        $ext = end($fileName);
        $new_file_name = md5(uniqid()) . '.' . $ext;




        if (
            $file && $file['name'] && $promotionPrice && $name  && $price && $description && $cateID  && $brandID && $serial && isset($_FILES['listproduct'])
        ) {
            //Check type file
            $allow_ext = ['jpg', 'png', 'gif', 'bmp', 'jpeg'];
            if (in_array($ext, $allow_ext)) {
                $size = $file['size'] / 1024 / 1024;
                if ($size <= $size_allow) {
                    $upload = move_uploaded_file($file['tmp_name'], '../product_img/' . $new_file_name);
                    if (!$upload) {
                        $error[] = 'error upload';
                    }
                } else {
                    $error = 'size_error';
                }
            } else {
                $error[] = 'ext_error';
            }




            if (isset($_FILES['listproduct'])) {
                $files_array = $_FILES['listproduct'];
                foreach ($files_array['name'] as $key => $nameImg) {
                    $imgName = explode('.', $nameImg);
                    $end = end($imgName);
                    $new_file_img = md5(uniqid()) . '.' . $end;
                    $imgs[] = $new_file_img;
                }

                foreach ($files_array['tmp_name'] as $key => $nameTemp) {
                    $imgNameTemps[] = $nameTemp;
                }

                $count = count($imgs);
                for ($i = 0; $i < $count; $i++) {
                    move_uploaded_file($imgNameTemps[$i], '../product_img/' . $imgs[$i]);
                }
            }


            $data = [
                'name' => $name,
                'serial' => $serial,
                'price' => $price,
                'sale_price' => $promotionPrice,
                'hot' => $hot,
                'img' => $new_file_name,
                'description' => $description,
                'category_id' => $cateID,
                'brand_id' => $brandID,
                'creator' => $_SESSION['login']['id'],
                'list_img' => implode(",", $imgs)
            ];
            $this->productModel->createProduct($data);
            header("location:sayHi?type=add");
        } else {
            header('location:add');
        }
    }

    public function search()
    {
        $name = $_POST['name'];
        if ($name) {
            $products = $this->productModel->searchProduct($name);
            $this->view(
                'main-layout',
                [
                    'page' => 'products/searchProduct',
                    'pageName' => 'Tìm kiếm sản phẩm',
                    'products' => $products
                ]
            );
        } else {
            header("location:sayHi");
        }
    }



    public function edit($id)
    {
        $categories = $this->categoryModel->getCategories();
        $brands = $this->brandModel->getBrands();
        $product = $this->productModel->getProduct($id);
        $specification = $this->specificationModel->getSpecificationById($id);
        $this->view(
            'main-layout',
            [
                'page' => 'products/editProduct',
                'pageName' => 'Cập nhật sản phẩm',
                'categories' => $categories,
                'brands' => $brands,
                'product' => $product,
                'specification' => $specification
            ]
        );
    }

    public function update($id)
    {
        $product = $this->productModel->getProduct($id);
        $serial = $_POST['serial'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $promotionPrice = $_POST['sale_price'];
        $hot = $_POST['hot'];
        $description = $_POST['description'];
        $file = $_FILES['file'];
        $cateID = $_POST['category_id'];
        $brandID = $_POST['brand_id'];

        // format name file
        $error = [];
        $size_allow = 10;
        $fileName = $file['name'];
        $fileName = explode('.', $fileName);
        $ext = end($fileName);
        $new_file_name = md5(uniqid()) . '.' . $ext;

        //Check type file
        $allow_ext = ['jpg', 'png', 'gif', 'bmp', 'jpeg'];
        if (in_array($ext, $allow_ext)) {
            $size = $file['size'] / 1024 / 1024;
            if ($size <= $size_allow) {
                $upload = move_uploaded_file($file['tmp_name'], '../product_img/' . $new_file_name);
                if ($upload) {
                    $status =  unlink('../product_img/' . $product['Img']);
                }
                if (!$upload) {
                    $error[] = 'error upload';
                }
            } else {
                $error = 'size_error';
            }
        } else {
            $error[] = 'ext_error';
        }

        $data = [];
        if ($name != $product['name']) {
            $data['name'] = $name;
        }

        if ($serial != $product['serial']) {
            $data['serial'] = $serial;
        }

        if ($price != $product['price']) {
            $data['price'] = $price;
        }

        if ($promotionPrice != $product['sale_price']) {
            $data['sale_price'] = $promotionPrice;
        }


        if ($cateID != $product['Category_id']) {
            $data['Category_id'] = $cateID;
        }

        if ($brandID != $product['brand_id']) {
            $data['brand_id'] = $brandID;
        }



        if ($description != $product['Description']) {
            $data['Description'] = $description;
        }

        if ($hot != $product['Hot']) {
            $data['Hot'] = $hot;
        }

        if ($file && $file['name']) {
            $data['img'] = $new_file_name;
        }

        if (isset($_FILES['listproduct'])) {
            $files_array = $_FILES['listproduct'];

            foreach ($files_array['name'] as $key => $nameImg) {
                if (!empty($nameImg)) {
                    $imgName = explode('.', $nameImg);
                    $end = end($imgName);
                    $new_file_img = md5(uniqid()) . '.' . $end;
                    $imgs[] = $new_file_img;
                }
            }

            foreach ($files_array['tmp_name'] as $key => $nameTemp) {
                $imgNameTemps[] = $nameTemp;
            }

            if (!empty($imgs)) {
                $count = count($imgs);
                if ($count > 0) {
                    for ($i = 0; $i < $count; $i++) {
                        move_uploaded_file($imgNameTemps[$i], '../product_img/' . $imgs[$i]);
                    }
                    $data['list_img'] =  implode(",", $imgs);
                }
            }
        }

        if (count($data) > 0) {
            $this->productModel->updateProduct($id, $data);
            header('location:../sayHi?type=update');
        } else {
            header('location:../sayHi');
        }
    }

    function editQuantity($id)
    {
        $product = $this->productModel->getProduct($id);
        $this->view(
            'main-layout',
            [
                'page' => 'products/updateQuantity',
                'pageName' => 'Cập nhật số lượng',
                'product' => $product,
            ]
        );
    }

    public function updateQuantity($id)
    {
        $product = $this->productModel->getProduct($id);
        if (!isset($_POST['quantity'])) {
            header("location:../editQuantity/${id}");
            return;
        }
        $quantity = $_POST['quantity'];
        $data = [];
        if ($quantity != $product['quantity']) {
            $data['quantity'] = $quantity;
        }

        if (count($data) > 0) {
            $this->productModel->updateProduct($id, $data);
        }
        header('location:../sayHi?type=update');
    }

    public function delete()
    {
        $id = $_POST['id'];
        if ($id) {
            $this->productModel->deleteProduct($id);
            header('location:sayHi?type=del');
        } else {
            header('location:sayHi');
        }
    }

    public function addSpecification($id)
    {
        $this->view(
            'main-layout',
            [
                'page' => 'specifications/addSpecification',
                'pageName' => 'Thông số kỹ thuật',
                'id' => $id,
            ]
        );
    }

    public function createSpecification($id)
    {
        $product_id = $id;
        $key = $_POST['key'];
        $value = $_POST['value'];

        if (empty($value) && empty($key)) {
            header("location:../addSpecification/${product_id}");
            return;
        }
        $data = [
            '`key`' => $key,
            '`value`' => $value,
            'product_id' => $product_id
        ];

        $this->specificationModel->createSpecification($data);
        header("location:../edit/${product_id}?type=add");
    }

    public function editSpecification($id)
    {
        $result = $this->specificationModel->findSpecification($id);
        $this->view(
            'main-layout',
            [
                'page' => 'specifications/editSpecification',
                'pageName' => 'Thông số kỹ thuật',
                'specification' => $result,
            ]
        );
    }

    public function updateSpecification($id)
    {
        $data = [];
        $key = $_POST['key'];
        $value = $_POST['value'];

        if (empty($key) && empty($value)) {
            header("location:../editSpecification/${id}");
            return;
        }

        $result = $this->specificationModel->findSpecification($id);

        if ($key != $result['key']) {
            $data['`key`'] = $key;
        }

        if ($value != $result['value']) {
            $data['`value`'] = $value;
        }

        if (count($data) > 0) {
            $this->specificationModel->updateSpecification($id, $data);
            header("location:../editSpecification/${id}?type=update");
        } else {
            header("location:../editSpecification/${id}");
        }
    }

    public function deleteSpecification($id)
    {
        $result = $this->specificationModel->findSpecification($id);
        $this->specificationModel->deleteSpecification($id);
        header("location:../edit/${result['product_id']}?type=del");
    }
}
