<?php
class CommentController extends BaseController
{
    private $commentModel;

    public function __construct()
    {
        $this->commentModel = $this->model('CommentModel');
    }

    public function create($id)
    {
        $email = $_POST['email'];
        $content = $_POST['content'];
        $rate = $_POST['rate'];
        $product_id = $id;
        if (!empty($email) && !empty($content) && !empty($rate) && !empty($product_id)) {
            $data = [
                'email' => $email,
                'content' => $content,
                'rate' => $rate,
                'product_id' => $product_id
            ];
            $this->commentModel->createComment($data);
            header("location:?url=/product/show/${product_id}");
        } else {
            header("location:?url=/product/show/${product_id}");
        }

        print_r($data);
    }
}
