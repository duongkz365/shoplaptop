<?php
class ContactController extends BaseController
{

    private $contactModel;

    public function __construct()
    {
        $this->contactModel = $this->model('ContactModel');
    }

    public function sayHi()
    {
        $type = $_GET['type'] ?? null;
        $message = $_GET['message'] ?? null;
        $this->view(
            'main-layout',
            [
                'page' => 'contacts/index',
                'pageName' => 'Liên hệ',
                'type' =>  $type,
                'message' => $message,
            ]
        );
    }

    public function create($id)
    {
        $email = $_POST['email'];
        $content = $_POST['content'];
        $name = $_POST['name'];

        if (empty($email) || empty($content) || empty($name)) {
            header("location:?url=contact&type=error&message=Vui lòng nhập đầy đủ thông tin");
            return;
        }

        if (!empty($email) && !empty($content) && !empty($name)) {
            $data = [
                'email' => $email,
                'content' => $content,
                'name' => $name,
                'customer_id' => $id
            ];
            $this->contactModel->createContact($data);
            header("location:?url=contact&type=add");
        } else {
            header("location:?url=contact");
        }
    }
}
