<?php
class Func
{

    private $url;


    public function __construct()
    {
        if (isset($_REQUEST['url'])) {
            $this->url =  explode('/', filter_var(trim($_REQUEST['url'], '/')));
        }
    }

    public function getUrl()
    {
        return $this->url;
    }



    function handleActive($name)
    {
        if (empty($this->url)) {
            $display = 'active';
        }
        if ($this->url[0] == $name) {
            $active = 'active';
        }

        return ['active' => $active, 'display' => $display];
    }




    public function handleDisplayPageLink()
    {

        $url = $this->url;
        if (isset($url[1]) && $url[1] !== 'sayHi') {
            return ['display' => 'display:flex', 'url' => $url];
        }
    }

    public function handlePaddingContent()
    {
        $url = $this->url;
        if (isset($url[0]) && $url[0] !== 'home') {
            return 'padding:66px 20px 20px 20px;';
        }
    }

    public function handleNameController()
    {

        switch ($this->url[0]) {
            case 'product':
                return 'Manage Products';
                break;
            case 'category':
                return 'Manage Categories';
                break;
            case 'brand':
                return 'Manage Brands';
                break;
            case 'customer':
                return 'Manage Customers';
                break;
            case 'order':
                return 'Order Management';
                break;
            case 'payment':
                return 'Manage Payments';
                break;
            case 'promotion':
                return 'Manage Promotion and discount';
                break;
            case 'user':
                return 'Manage User';
                break;
            case 'comment':
                return 'Manage Comments and reviews';
                break;
            case 'contact':
                return 'Contact';
                break;
        }
    }

    public function handleNameControllerShort()
    {

        switch ($this->url[0]) {
            case 'product':
                return 'Products';
                break;
            case 'category':
                return 'Categories';
                break;
            case 'brand':
                return 'Brands';
                break;
            case 'customer':
                return 'Customers';
                break;
            case 'order':
                return 'Order';
                break;
            case 'payment':
                return 'Payment Payments';
                break;
            case 'promotion':
                return 'Promotion and discount';
                break;
            case 'user':
                return 'User';
                break;
            case 'comment':
                return 'Comments and reviews';
                break;
            case 'contact':
                return 'Contact';
                break;
        }
    }

    public function handleNameAction()
    {
        switch ($this->url[1]) {
            case 'add':
                return "Add " . $this->handleNameControllerShort();
                break;
            case 'show':
                return "Detail " . $this->handleNameControllerShort();
                break;
            case 'edit':
                return "Update " . $this->handleNameControllerShort();
                break;
            case 'search':
                return "Search " . $this->handleNameControllerShort();
                break;
            case 'editSpecification':
                return  "editSpecification";
                break;
            case 'addSpecification':
                return  "addSpecification";
                break;
            case 'editStatus':
                return  "editStatus";
                break;
            case 'editQuantity':
                return  "editQuantity";
                break;
        }
    }

    public function handleGetUser($userId)
    {
        require_once "./App/models/UserModel.php";
        $userModel = new UserModel;
        return $userModel->getUser($userId);
    }
}
