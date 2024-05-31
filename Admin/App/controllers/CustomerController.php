<?php
class CustomerController extends BaseController
{
    private $customerModel;

    public function __construct()
    {
        $this->customerModel = $this->model('CustomerModel');
    }

    public function sayHi()
    {
        $customers = $this->customerModel->getCustomers();
        $this->view(
            'main-layout',
            [
                'page' => 'customers/index',
                'pageName' => 'Khách hàng',
                'customers' => $customers
            ]
        );
    }

    public function search()
    {
        $name = $_POST['name'];
        if ($name) {
            $customers = $this->customerModel->searchCustomers($name);
            $this->view(
                'main-layout',
                [
                    'page' => 'customers/searchCustomer',
                    'pageName' => 'Khách hàng',
                    'customers' => $customers
                ]
            );
        } else {
            header('Location:sayHi');
        }
    }

    public function add()
    {
        $this->view(
            'main-layout',
            ['page' => 'customers/addCustomer', 'pageName' => 'Thêm Khách hàng']
        );
    }

    public function create()
    {
        $post = $_POST;
        if (!empty($post['name']) && !empty($post['email']) && !empty($post['password']) && !empty($post['address']) && !empty($post['birthday'])) {
            $age = floor((time() - strtotime($post['birthday'])) / 31556926); // Tính số tuổi của người dùng

            if ($age <= 18) {
                header("location:sayHi?type=error&message=Người dùng phải trên 18 tuổi");
                return;
            }

            if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
                header("location:sayHi?type=error&message=Vui lòng nhập lại email");
                return;
            }

            $customerEmail = $this->customerModel->findEmail($post['email']);
            if (!isset($customerEmail)) {
                $data = $post;
                $data['password'] = md5($data['password']);
                $this->customerModel->createCustomer($data);
                header("location:sayHi?type=add");
            } else {
                header("location:sayHi?type=error&message=Email này đã được dùng");
            }
        } else {
            header("location:add");
        }
    }

    public function edit($id)
    {
        $customer = $this->customerModel->getCustomer($id);
        $this->view(
            'main-layout',
            ['page' => 'customers/editCustomer', 'pageName' => 'Cập nhật Khách hàng', 'customer' => $customer]
        );
    }

    public function update($id)
    {
        $data = [];
        $post = $_POST;
        $customer = $this->customerModel->getCustomer($id);

        if (empty($post['name']) && empty($post['email']) && empty($post['password']) && empty($post['address']) && empty($post['birthday'])) {
            header("location:../edit/${id}");
            return;
        }

        if ($post['name'] != $customer['name']) {
            $data['name'] = $post['name'];
        }
        if ($post['email'] != $customer['email']) {
            $data['email'] = $post['email'];
        }
        if ($post['phone'] != $customer['phone']) {
            $data['phone'] = $post['phone'];
        }
        if ($post['address'] != $customer['address']) {
            $data['address'] = $post['address'];
        }
        if ($post['birthday'] != $customer['birthday']) {
            $data['birthday'] = $post['birthday'];
        }
        if ($post['password'] != '') {
            $data['password'] = md5($post['password']);
        }
        if (count($data) > 0) {
            $this->customerModel->updateCustomer($id, $data);
            header("location:../sayHi?type=update");
        } else {
            header("location:../sayHi");
        }
    }

    public function delete()
    {
        $id = $_POST['id'];
        if ($id) {
            $this->customerModel->deleteCustomer($id);
            header("location:sayHi?type=del");
        } else {
            header("location:sayHi");
        }
    }
}
