<?php

class func extends BaseController
{
    public function getCategory()
    {
        require_once "./Customer/App/models/categoryModel.php";
        $categoryModel = new CategoryModel;
        return $categoryModel->getCategories();
    }

    public function handleStarProduct($product_id)
    {
        require_once "./Customer/App/models/CommentModel.php";
        $commentModel = new CommentModel;
        $result = $commentModel->averageCommentById($product_id);
        $star = mysqli_fetch_assoc($result);
        return $star['star'];
    }
}
