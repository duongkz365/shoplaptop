<?php
class AuthController extends BaseController
{
    private $categoryModel;
    private $customerModel;

    public function __construct()
    {
        $this->categoryModel = $this->model('categoryModel');
        $this->customerModel = $this->model('customerModel');
    }

    public function sayHi()
    {
        $successAccount =  $_SESSION['success_account'] ?? null;

        $this->view(
            'main-layout',
            [
                'page' => 'auth/login',
                'pageName' => 'Đăng nhập',
                'successAccount' => $successAccount
            ]
        );
        if ($successAccount) {
            unset($_SESSION['success_account']);
        }
    }

    public function signIn()
    {
        $email = $_POST['username'];
        $pass = $_POST['password'];

        if (empty($email) || empty($pass)) {
            $err = 'Vui lòng nhập thông tin';
            $this->view(
                'main-layout',
                [
                    'page' => 'auth/login',
                    'pageName' => 'Đăng nhập',
                    'error' => $err,
                ]
            );
            return;
        }
        $customer = $this->customerModel->findEmail($email); //Tìm email
        if ($customer) { // Nếu có email
            if (md5($pass) == $customer['password']) { //Kiểm tra password
                $_SESSION['customer'] = $customer; // Tạo session_login
                header('Location:?url=home');
            } else {
                $err = 'Mật khẩu không chính xác';
                $this->view(
                    'main-layout',
                    [
                        'page' => 'auth/login',
                        'pageName' => 'Đăng nhập',
                        'error' => $err,
                    ]
                );
            }
        } else {
            $err = 'Email không tồn tại';
            $this->view(
                'main-layout',
                [
                    'page' => 'auth/login',
                    'pageName' => 'Đăng nhập',
                    'error' => $err
                ]
            );
        }
    }

    public function register()
    {
        $this->view(
            'main-layout',
            [
                'page' => 'auth/register',
                'pageName' => 'Đăng ký',
            ]
        );
    }

    public function create()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass_r = $_POST['pass_r'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phoneNumber'];

        $customerEmail = $this->customerModel->findEmail($email);
        $customerPhoneNumber = $this->customerModel->findPhoneNumber($phoneNumber);



        if (empty($name) || empty($email) || empty($pass) || empty($pass_r) || empty($birthday) ||  empty($address) || empty($phoneNumber)) {
            $this->view(
                'main-layout',
                [
                    'page' => 'auth/register',
                    'pageName' => 'Đăng ký',
                    "error" => "Vui lòng nhập đầy đủ dữ liệu"
                ]
            );
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->view(
                'main-layout',
                [
                    'page' => 'auth/register',
                    'pageName' => 'Đăng ký',
                    "error" => "Email không hợp lệ"
                ]
            );
            return;
        }

        $age = floor((time() - strtotime($birthday)) / 31556926); // Tính số tuổi của người dùng
        if ($age <= 18) {
            $this->view(
                'main-layout',
                [
                    'page' => 'auth/register',
                    'pageName' => 'Đăng ký',
                    "error" => "Không thể đăng ký tài khoản khi dưới 18 tuổi"
                ]
            );
            return;
        }

        if ($pass != $pass_r) {
            $this->view(
                'main-layout',
                [
                    'page' => 'auth/register',
                    'pageName' => 'Đăng ký',
                    "error" => "Mật khẩu không trùng khớp"
                ]
            );
            return;
        }


        if (isset($customerEmail) && isset($customerPhoneNumber)) {
            $this->view(
                'main-layout',
                [
                    'page' => 'auth/register',
                    'pageName' => 'Đăng ký',
                    "error" => "Email hoặc số điện thoại đã tồn tại"
                ]
            );
            return;
        }



        $data = [
            'name' => $name,
            'email' => $email,
            'password' => md5($pass),
            'birthday' => $birthday,
            'address' => $address,
            'phone' => $phoneNumber
        ];
        $this->customerModel->createCustomer($data);
        $_SESSION['success_account'] = true;
        header("location:?url=Auth/sayHi");
    }

    public function logout()
    {
        if ($_SESSION['customer']) {
            unset($_SESSION['customer']);
            header('Location:?url=home');
        }
    }
}
