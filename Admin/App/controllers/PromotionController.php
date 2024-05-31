<?php
class PromotionController extends BaseController
{
    private $promotionModel;
    public function __construct()
    {
        $this->promotionModel = $this->model('PromotionModel');
    }

    public function sayHi()
    {
        $listPromotion = $this->promotionModel->getPromotions();
        $this->view(
            'main-layout',
            [
                'page' => 'promotions/index',
                'pageName' => 'Khuyến mãi',
                'promotions' => $listPromotion
            ]
        );
    }

    public function add()
    {
        $this->view(
            'main-layout',
            [
                'page' => 'promotions/addPromotion',
                'pageName' => 'Thêm khuyến mãi'
            ]
        );
    }

    public function search()
    {
        $name = $_POST['name'];
        if ($name) {
            $suppliers = $this->promotionModel->searchPromotions($name);
            $this->view(
                'main-layout',
                [
                    'page' => 'promotions/searchPromotion',
                    'pageName' => 'Tìm kiếm khuyến mãi',
                    'promotions' => $suppliers
                ]
            );
        } else {
            header('Location:sayHi');
        }
    }

    public function create()
    {
        $name = $_POST['name'];
        $code = $_POST['code'];
        $price = $_POST['price'];

        $data  = [
            'name' => $name,
            'code' => $code,
            'price' => $price,
        ];

        if ($name && $code && $price) {
            $this->promotionModel->createPromotion($data);
            header("location:sayHi?type=add");
        } else {
            header("location:add");
        }
    }

    public function edit($id)
    {
        $promotion = $this->promotionModel->getPromotion($id);
        $this->view(
            'main-layout',
            [
                'page' => 'promotions/editPromotion',
                'pageName' => 'Cập nhật khuyến mãi',
                'promotion' => $promotion
            ]
        );
    }

    public function update($id)
    {
        $data = [];
        $promotion = $this->promotionModel->getPromotion($id);
        $name = $_POST['name'];
        $code = $_POST['code'];
        $price = $_POST['price'];

        if ($name && $code && $price) {
            if ($name != $promotion['name']) {
                $data['name'] = $name;
            }

            if ($price != $promotion['price']) {
                $data['price'] = $price;
            }

            if ($code != $promotion['code']) {
                $data['code'] = $code;
            }
        } else {
            header("location:../edit/${id}");
        }

        if ((count($data) > 0)) {
            $this->promotionModel->updatePromotion($id, $data);
            header("location:../sayHi?type=update");
        } else {
            header("location:../sayHi");
        }
    }

    public function delete()
    {
        $productModel = $this->model('PromotionModel');
        $id = $_POST['id'];
        $this->promotionModel->deletePromotion($id);
        header("location:sayHiv?type=del");
    }
}
