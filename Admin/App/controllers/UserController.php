<?php
class UserController extends BaseController
{
    private $userModel;
    private $orderModel;

    public function __construct()
    {
        $this->userModel = $this->model('UserModel');
        $this->orderModel = $this->model('OrderModel');
    }

    public function sayHi()
    {
        $listUsers = $this->userModel->getUsers();
        $this->view(
            'main-layout',
            ['page' => 'users/index', 'pageName' => 'Nhân viên', 'users' => $listUsers]
        );
    }

    public function add()
    {
        $this->view(
            'main-layout',
            ['page' => 'users/addUser', 'pageName' => 'Thêm nhân viên']
        );
    }

    public function search()
    {
        $name = $_POST['name'];
        if ($name) {
            $users = $this->userModel->searchUsers($name);
            $this->view(
                'main-layout',
                [
                    'page' => 'users/searchUser',
                    'pageName' => 'Tìm kiếm nhân viên',
                    'users' => $users
                ]
            );
        } else {
            header('Location:sayHi');
        }
    }

    public function create()
    {
        $post = $_POST;
        if (!empty($post['name']) && !empty($post['email']) && !empty($post['password'])) {
            $data = $post;
            $data['password'] = md5($data['password']);
            $data['role'] = 1;
            $this->userModel->createUser($data);
            header("location:sayHi?type=add");
        } else {
            header("location:add");
        }
    }

    public function edit($id)
    {
        $user = $this->userModel->getUser($id);
        $this->view(
            'main-layout',
            ['page' => 'users/editUser', 'pageName' => 'Cập nhật nhân viên', 'user' => $user]
        );
    }

    public function update($id)
    {
        $data = [];
        $post = $_POST;
        $user = $this->userModel->getUser($id);

        if ($post['name'] != $user['name']) {
            $data['name'] = $post['name'];
        }
        if ($post['email'] != $user['email']) {
            $data['email'] = $post['email'];
        }
        if ($post['phone'] != $user['phone']) {
            $data['phone'] = $post['phone'];
        }
        if ($post['address'] != $user['address']) {
            $data['address'] = $post['address'];
        }
        if ($post['gender'] != $user['gender']) {
            $data['gender'] = $post['gender'];
        }
        if ($post['password'] != '') {
            $data['password'] = md5($post['password']);
        }
        if (count($data) > 0) {
            $this->userModel->updateUser($id, $data);
            header("location:../sayHi?type=update");
        } else {
            header("location:../sayHi");
        }
    }

    public function delete()
    {
        $id = $_POST['id'];
        $order = $this->orderModel->getOrderApprover($id);
        if (!is_array($order)) {
            // xử lý lỗi hoặc trả về một mảng trống
            $order = [];
        }
        if (count($order) > 0) {
            header("location:sayHi?type=error&message=Không thể xoá nhân viên vì đã duyệt đơn hàng!");
        } else {
            if ($id) {
                $this->userModel->deleteUser($id);
                header("location:sayHi?type=del");
            } else {
                header("location:sayHi");
            }
        }
    }
}
