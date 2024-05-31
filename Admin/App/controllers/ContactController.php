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
        $listContacts = $this->contactModel->getContacts();
        $this->view(
            'main-layout',
            ['page' => 'contacts/index', 'pageName' => 'Liên hệ', 'contacts' => $listContacts]
        );
    }

    public function search()
    {
        $name = $_POST['name'];
        if ($name) {
            $contacts = $this->contactModel->searchContacts($name);
            $this->view(
                'main-layout',
                [
                    'page' => 'contacts/searchContact',
                    'pageName' => 'Tìm kiếm liên hệ',
                    'brands' => $contacts
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
            $this->contactModel->createContact($data);
            header("location:sayHi?type=add");
        } else {
            header("location:add");
        }
    }

    public function edit($id)
    {
        $contact = $this->contactModel->getContact($id);
        $this->view(
            'main-layout',
            ['page' => 'contacts/editContact', 'pageName' => 'Cập nhật liên hệ', 'contact' => $contact]
        );
    }

    public function update($id)
    {
        $data = [];
        $name = $_POST['name'];
        $contact = $this->contactModel->getBrand($id);

        if ($name) {
            if ($name != $contact['name']) {
                $data['name'] = $name;
            }
        }

        if (count($data) > 0) {
            $this->contactModel->updateContact($id, $data);
            header("location:../sayHi");
        } else {
            header("location:../sayHi");
        }
    }

    public function delete()
    {
        $id = $_POST['id'];
        $this->contactModel->deleteContact($id);
        header("location:sayHi?type=del");
    }
}
