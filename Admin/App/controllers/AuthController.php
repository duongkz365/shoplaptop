<?php
class AuthController extends BaseController
{
    private $AdminModel;
    public function __construct()
    {
        $this->AdminModel = $this->model('UserModel');
    }

    public function sayHi()
    {
        $this->view('auth-layout', [
            'page' => 'auth/login',
            'pageName' => 'Login'
        ]);
    }

    public function signIn()
    {
        $email = $_POST['username'];
        $pass = $_POST['password'];

        $result = $this->AdminModel->findEmail($email); //Tìm email
        if (empty($email)) {
            $err = 'Vui lòng nhập email';
            $this->view('auth-layout', [
                'page' => 'auth/login',
                'pageName' => 'Login',
                'error' => $err
            ]);
            return;
        }

        if (empty($pass)) {
            $err = 'Vui lòng nhập mật khẩu';
            $this->view('auth-layout', [
                'page' => 'auth/login',
                'pageName' => 'Login',
                'error' => $err
            ]);
            return;
        }

        if ($result) { // Nếu có email
            if ($result['status'] == 0) {
                $err = 'Tài khoản hiện tại không thể truy cập';
                $this->view('auth-layout', [
                    'page' => 'auth/login',
                    'pageName' => 'Login',
                    'error' => $err
                ]);
                return;
            }

            if (md5($pass) == $result['password']) { //Kiểm tra password
                $_SESSION['login'] = $result; // Tạo session_login
                header('Location:home');
            } else {
                $err = 'Mật khẩu không chính xác';
                $this->view('auth-layout', [
                    'page' => 'auth/login',
                    'pageName' => 'Login',
                    'error' => $err
                ]);
            }
        } else {
            $err = 'Email không tồn tại';
            $this->view('auth-layout', [
                'page' => 'auth/login',
                'pageName' => 'Login',
                'error' => $err
            ]);
        }
    }

    public function logout()
    {
        if ($_SESSION['login']) {
            unset($_SESSION['login']);
            header('Location: ../auth/login');
        }
    }
}
