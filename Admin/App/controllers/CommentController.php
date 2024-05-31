<?php
class CommentController extends BaseController
{
    private $commentModel;


    public function __construct()
    {
        $this->commentModel = $this->model('CommentModel');
    }

    public function sayHi()
    {
        $comments = $this->commentModel->getComments();
        $this->view('main-layout', [
            'page' => 'comments/index',
            'pageName' => 'Bình luận',
            'comments' => $comments
        ]);
    }

    public function search()
    {
        $email = $_POST['name'];
        if ($email) {
            $comments = $this->commentModel->findEmail($email);
            $this->view(
                'main-layout',
                [
                    'page' => 'comments/search',
                    'pageName' => 'Tìm kiếm danh mục sản phẩm',
                    'comments' => $comments
                ]
            );
        } else {
            header('Location:sayHi');
        }
    }

    public function edit($id)
    {
        $comment = $this->commentModel->getComment($id);
        $this->view(
            'main-layout',
            ['page' => 'comments/editComment', 'pageName' => 'Cập nhật Đánh giá', 'comment' => $comment]
        );
    }

    public function accept($id)
    {
        $this->commentModel->updateComment($id, ['status_comment' => 1]);
        header("location:../sayHi?type=update");
    }

    public function update($id)
    {
        $data = [];
        $email = $_POST['email'];
        $content = $_POST['content'];
        $rate = $_POST['rate'];
        $comment = $this->commentModel->getComment($id);

        if (empty($email) && empty($content) && empty($rate)) {
            header("location:../edit/${id}");
            return;
        }



        if ($email != $comment['email']) {
            $data['email'] = $email;
        }

        if ($content != $comment['content']) {
            $data['content'] = $content;
        }

        if ($rate != $comment['rate']) {
            $data['rate'] = $rate;
        }


        if (count($data) > 0) {
            $this->commentModel->updateComment($id, $data);
            header("location:../sayHi?type=update");
        } else {
            header("location:../sayHi");
        }
    }

    public function delete()
    {
        $id = $_POST['id'];
        if ($id) {
            $this->commentModel->deleteComment($id);
            header("location:sayHi?type=del");
        } else {
            header("location:sayHi");
        }
    }
}
