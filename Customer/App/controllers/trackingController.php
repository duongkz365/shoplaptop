<?php
class TrackingController extends BaseController
{
    private $customerModel;
    private $orderModel;
    private $paymentModel;
    private $promotionModel;

    public function __construct()
    {
        $this->customerModel = $this->model('CustomerModel');
        $this->orderModel = $this->model('OrderModel');
        $this->paymentModel = $this->model('PaymentModel');
        $this->promotionModel = $this->model('PromotionModel');
    }

    public function sayHi()
    {
        $this->view(
            'main-layout',
            [
                'page' => 'orders/lookup',
                'pageName' => 'Tra cứu đơn hàng',
            ]
        );
    }

    public function lookup()
    {
        $error = '';
        $phone = $_POST['phone'];
        $order_id = $_POST['order_id'];

        if (empty($phone)) {
            $error = 'Vui lòng nhập số điện thoại';
            $this->view(
                'main-layout',
                [
                    'page' => 'orders/lookup',
                    'pageName' => 'Tra cứu đơn hàng',
                    'error' => $error,
                ]
            );
            return;
        }

        if (empty($order_id)) {
            $error = 'Vui lòng nhập mã đơn hàng';
            $this->view(
                'main-layout',
                [
                    'page' => 'orders/lookup',
                    'pageName' => 'Tra cứu đơn hàng',
                    'error' => $error,
                ]
            );
            return;
        }

        $result = $this->customerModel->findPhoneNumber($phone);
        $order = $this->orderModel->getOrderByPhoneCustomer($phone, $order_id);
        $orderNew = mysqli_fetch_array($order);
        $promotion = $this->promotionModel->getPromotion($orderNew['promotion_id']);
        $payment = $this->paymentModel->getPayment($orderNew['payment_id']);
        if (empty($result)) {
            $error = 'Số điện thoại không tồn tại';
            $this->view(
                'main-layout',
                [
                    'page' => 'orders/lookup',
                    'pageName' => 'Tra cứu đơn hàng',
                    'error' => $error,
                ]
            );
            return;
        }

        if (empty($orderNew)) {
            $error = 'Mã đơn hàng chưa chính xác';
            $this->view(
                'main-layout',
                [
                    'page' => 'orders/lookup',
                    'pageName' => 'Tra cứu đơn hàng',
                    'error' => $error,
                ]
            );
            return;
        }

        $orderDetails = $this->orderModel->getOrderDetails($orderNew['order_id']);

        $this->view(
            'main-layout',
            [
                'page' => 'orders/lookup',
                'pageName' => 'Tra cứu đơn hàng',
                'order' => $orderNew,
                'orderDetails' => $orderDetails,
                'payment' => $payment,
                'promotion' => $promotion ?? [],
            ]
        );
    }
}
