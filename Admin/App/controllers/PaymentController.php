<?php
class PaymentController extends BaseController
{
    private $paymentModel;

    public function __construct()
    {
        $this->paymentModel = $this->model('PaymentModel');
    }

    public function sayHi()
    {
        $listPayments = $this->paymentModel->getPayments();
        $this->view(
            'main-layout',
            ['page' => 'payments/index', 'pageName' => 'Phương thức thanh toán', 'payments' => $listPayments]
        );
    }

    public function add()
    {
        $this->view(
            'main-layout',
            ['page' => 'payments/addPayment', 'pageName' => 'Thêm ']
        );
    }

    public function search()
    {
        $name = $_POST['name'];
        if ($name) {
            $payments = $this->paymentModel->searchPayments($name);
            $this->view(
                'main-layout',
                [
                    'page' => 'payments/searchPayment',
                    'pageName' => 'Tìm kiếm phương thức thanh toán',
                    'brands' => $payments
                ]
            );
        } else {
            header('Location:sayHi');
        }
    }

    public function create()
    {
        $name = $_POST['name'];
        if ($name) {
            $data  = ['name' => $name];
            $this->paymentModel->createPayment($data);
            header("location:sayHi?type=add");
        } else {
            header("location:add");
        }
    }

    public function edit($id)
    {
        $payment = $this->paymentModel->getPayment($id);
        $this->view(
            'main-layout',
            ['page' => 'payments/editPayment', 'pageName' => 'Cập nhật phương thức thanh toán', 'payment' => $payment]
        );
    }

    public function update($id)
    {
        $data = [];
        $name = $_POST['name'];
        $payment = $this->paymentModel->getPayment($id);


        if ($name) {
            if ($name != $payment['name']) {
                $data['name'] = $name;
            }
        }

        if (count($data) > 0) {
            $this->paymentModel->updatePayment($id, $data);
            header("location:../sayHi?type=update");
        } else {
            header("location:../sayHi");
        }
    }

    public function delete()
    {
        $id = $_POST['id'];
        if ($id) {
            $this->paymentModel->deletePayment($id);
            header("location:sayHi?type=del");
        } else {
            header("location:sayHi");
        }
    }
}
