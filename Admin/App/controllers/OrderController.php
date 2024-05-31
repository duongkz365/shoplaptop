<?php
class OrderController extends BaseController
{
    private $orderModel;
    private $paymentModel;
    private $orderDetailModel;
    private $productModel;
    private $userModel;
    private $promotionModel;

    public function __construct()
    {
        $this->orderModel = $this->model('OrderModel');
        $this->paymentModel = $this->model('PaymentModel');
        $this->orderDetailModel = $this->model('OrderDetailModel');
        $this->productModel = $this->model('ProductModel');
        $this->userModel = $this->model('UserModel');
        $this->promotionModel = $this->model('PromotionModel');
    }

    public function sayHi()
    {
        $orders =  $this->orderModel->getOrders();
        $this->view(
            'main-layout',
            [
                'page' => 'orders/index',
                'pageName' => 'Đơn đặt hàng',
                'orders' => $orders
            ]
        );
    }

    public function search()
    {
        $name = $_POST['name'];
        if ($name) {
            $orders = $this->orderModel->searchOrders($name);
            $this->view(
                'main-layout',
                [
                    'page' => 'orders/searchOrder',
                    'pageName' => 'Đơn đặt hàng',
                    'orders' => $orders
                ]
            );
        } else {
            header('location:sayHi');
        }
    }

    public function accept($id)
    {
        $data = ['status_order' => 2, 'approver' => $_SESSION['login']['id'] ?? 1];
        $this->orderModel->updateOrder($id, $data);
        header("location:../sayHi");
    }

    public function destroy($id)
    {
        $data = ['status_order' => 3, 'approver' => $_SESSION['login']['id'] ?? 1];
        $this->orderModel->updateOrder($id, $data);
        $orderDetails = $this->orderDetailModel->getOrderDetailByOrder($id);
        if (mysqli_num_rows($orderDetails) > 0) {
            while ($row = mysqli_fetch_array($orderDetails)) {
                $product =  $this->productModel->getProduct($row['product_id']);
                $this->productModel->updateProduct($row['product_id'], ['quantity' => $product['quantity'] + $row['quantity']]);
            }
        }
        header("location:../sayHi");
    }

    public function acceptShow($id)
    {

        $data = ['status_order' => 2, 'approver' => $_SESSION['login']['id'] ?? 1];
        $this->orderModel->updateOrder($id, $data);
        header("location:../show/${id}");
    }

    public function editStatus($id)
    {
        $order = $this->orderModel->getOrderById($id);
        $this->view(
            'main-layout',
            [
                'page' => 'orders/updateStatus',
                'pageName' => 'Cập nhật trạng thái',
                'order' => $order,
            ]
        );
    }

    public function updateStatus($id)
    {
        $status = $_POST['order_status'] ?? null;
        if ($status) {
            $data = ['status_order' => $status];
            $this->orderModel->updateOrder($id, $data);
            header("location:../show/${id}");
            return;
        }
        header("location:../editStatus/${id}");
    }

    public function destroyShow($id)
    {
        $data = ['status_order' => 3, 'approver' => $_SESSION['login']['id'] ?? 1];
        $this->orderModel->updateOrder($id, $data);
        $orderDetails = $this->orderDetailModel->getOrderDetailByOrder($id);
        if (mysqli_num_rows($orderDetails) > 0) {
            while ($row = mysqli_fetch_array($orderDetails)) {
                $product =  $this->productModel->getProduct($row['product_id']);
                $this->productModel->updateProduct($row['product_id'], ['quantity' => $product['quantity'] + $row['quantity']]);
            }
        }
        header("location:../show/${id}");
    }


    public function show($id)
    {
        $customerModel = $this->model('CustomerModel');
        $order = $this->orderModel->getOrderById($id);
        $promotion = $this->promotionModel->getPromotion($order['promotion_id']);
        $customerByOrder = $customerModel->getCustomer($order['customer_id']);
        $orderDetails = $this->orderModel->getOrderDetails($id);
        $payment = $this->paymentModel->getPayment($order['payment_id']);

        $this->view(
            'main-layout',
            [
                'page' => 'orders/showOrder',
                'pageName' => 'Chi tiết đơn hàng',
                'order' => $order,
                'customer' => $customerByOrder,
                'orderDetails' => $orderDetails,
                'payment' => $payment,
                'promotion' => $promotion ?? [],
            ]
        );
    }
}
