<?php
class OrderController extends BaseController
{
    private $productModel;
    private $categoryModel;
    private $orderModel;
    private $orderDetailModel;
    private $promotionModel;
    private $paymentModel;

    public function __construct()
    {
        $this->categoryModel = $this->model('categoryModel');
        $this->productModel = $this->model('productModel');
        $this->orderModel = $this->model('orderModel');
        $this->orderDetailModel = $this->model('orderDetailModel');
        $this->promotionModel = $this->model('PromotionModel');
        $this->paymentModel = $this->model('PaymentModel');
    }

    public function sayHi()
    {
        $categories = $this->categoryModel->getCategories();
        $orders = $this->orderModel->getOrders($_SESSION['customer']['id']);
        $this->view(
            'main-layout',
            [
                'page' => 'orders/index',
                'pageName' => 'Đơn hàng đã mua',
                'orders' => $orders
            ]
        );
    }

    public function cart()
    {
        $message = '';
        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
            $message = $_SESSION['error'];
        }
        $this->view(
            'main-layout',
            [
                'page' => 'orders/cart',
                "pageName" => 'Giỏ hàng',
                'message' => $message
            ]
        );
        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
            unset($_SESSION['error']);
        }
    }

    public function addProductToCart($productId)
    {
        $customer_id = $_SESSION['customer']['id'];
        // Lấy thông tin giỏ hàng từ session
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        $product = $this->productModel->getProduct($productId);
        $action = $_GET['action'];
        // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng thì cập nhật số lượng
        if (isset($cart[$customer_id]['listProduct'][$productId])) {
            if ($cart[$customer_id]['listProduct'][$productId]['quantity'] != $product['quantity']) {
                $cart[$customer_id]['listProduct'][$productId]['quantity'] += 1;
            } else {
                header("Location:?url=product/show/${productId}");
                $_SESSION['error'] = 'Số lượng sản phẩm không đủ';
                return;
            }
        } else {
            // Nếu sản phẩm chưa tồn tại thì thêm sản phẩm mới vào giỏ hàng
            if ($product !== null) {
                if ($product['quantity'] > 0) {
                    $cart[$customer_id]['listProduct'][$productId] = array(
                        'id' => $productId,
                        'name' => $product['name'],
                        'price' => $product['price'],
                        'quantity' => 1,
                        'img' => $product['img'],
                        'sale_price' => $product['sale_price'],
                        'price' => $product['price']
                    );
                }
            }
        }


        // Cập nhật giỏ hàng trong session
        $_SESSION['cart'] = $cart;
        if ($action == '1') {
            header('Location:?url=order/cart');
            return;
        }
        if ($action == '2') {
            if (isset($_SESSION['customer'])) {
                header("Location:?url=product/show/${productId}");
            } else {
                header('Location:?url=order/cart');
            }
            return;
        }
        header('Location:?url=order/cart');
    }


    public function increaseProductFromCart($productId)
    {
        $product = $this->productModel->getProduct($productId);
        $customer_id = $_SESSION['customer']['id'];
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        if (isset($cart[$customer_id]['listProduct'][$productId])) {
            if ($cart[$customer_id]['listProduct'][$productId]['quantity'] == $product['quantity']) {
                header("Location:?url=order/cart");
                $_SESSION['error'] = 'Số lượng sản phẩm không đủ';
                return;
            } else {
                $cart[$customer_id]['listProduct'][$productId]['quantity'] += 1;
            }
        }

        // Cập nhật giỏ hàng trong session
        $_SESSION['cart'] = $cart;
        header('Location:?url=order/cart');
    }

    public function decreaseProductFromCart($productId)
    {
        $customer_id = $_SESSION['customer']['id'];

        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
        if (isset($cart[$customer_id]['listProduct'][$productId])) {
            if ($cart[$customer_id]['listProduct'][$productId]['quantity'] > 1) {
                $cart[$customer_id]['listProduct'][$productId]['quantity'] -= 1;
            } else {
                // Nếu số lượng là 1 thì xóa sản phẩm khỏi giỏ hàng
                unset($cart[$customer_id]['listProduct'][$productId]);
            }
        }

        // Cập nhật giỏ hàng trong session
        $_SESSION['cart'] = $cart;
        header('Location:?url=order/cart');
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeProductFromCart($productId)
    {
        $customer_id = $_SESSION['customer']['id'];
        // Lấy thông tin giỏ hàng từ session
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

        // Xóa sản phẩm khỏi giỏ hàng
        if (isset($cart[$customer_id]['listProduct'][$productId])) {
            unset($cart[$customer_id]['listProduct'][$productId]);
        }

        // Cập nhật giỏ hàng trong session
        $_SESSION['cart'] = $cart;

        header('Location:?url=order/cart');
    }

    public function addPromotion()
    {
        $code = $_POST['code'];
        if (empty($code)) {
            $this->view(
                'main-layout',
                [
                    'page' => 'orders/cart',
                    "pageName" => 'Giỏ hàng',
                    'error' => 'Vui lòng nhập mã giảm giá'
                ]
            );
            return;
        }
        $result = $this->promotionModel->getPromotionName($code);
        $promotion = mysqli_fetch_array($result);
        if (!empty($promotion)) {
            $checkPromotion = $this->orderModel->checkPromotion($_SESSION['customer']['id'], $promotion['id']);
            $result = mysqli_fetch_array($checkPromotion);
            if (empty($result)) {
                $customer_id = $_SESSION['customer']['id'];
                // Lấy thông tin giỏ hàng từ session
                $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
                $cart[$customer_id]['promotion'] = $promotion;
                // Cập nhật giỏ hàng trong session
                $_SESSION['cart'] = $cart;

                $this->view(
                    'main-layout',
                    [
                        'page' => 'orders/cart',
                        "pageName" => 'Giỏ hàng',
                    ]
                );
            } else {
                $this->view(
                    'main-layout',
                    [
                        'page' => 'orders/cart',
                        "pageName" => 'Giỏ hàng',
                        'error' => 'Mã giảm giá đã được sử dụng'
                    ]
                );
            }
        } else {
            $this->view(
                'main-layout',
                [
                    'page' => 'orders/cart',
                    "pageName" => 'Giỏ hàng',
                    'error' => 'Mã giảm giá không tồn tại'
                ]
            );
        }
    }

    public function removePromotion()
    {
        $customer_id = $_SESSION['customer']['id'];
        // Lấy thông tin giỏ hàng từ session
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

        if (isset($cart[$customer_id]['promotion'])) {
            unset($cart[$customer_id]['promotion']);
        }

        // Cập nhật giỏ hàng trong session
        $_SESSION['cart'] = $cart;

        header('Location:?url=order/cart');
    }

    public function pay()
    {
        $total = $_POST['total'];

        if ($total == 0) {
            header('location:?url=order/cart');
            return;
        }

        $payments = $this->paymentModel->getPayments();

        $this->view(
            'main-layout',
            [
                'pageName' => 'Thông tin thanh toán',
                'page' => 'orders/pay',
                'totalPrice' => $total,
                'payments' => $payments,
            ]
        );
    }

    public function thank()
    {
        $transportFee = $_POST['transportFee'];
        $total = $_POST['total'];
        $name_receive = $_POST['name_receive'];
        $phone_receive = $_POST['phone_receive'];
        $address_receive = $_POST['address_receive'];
        $note = $_POST['note'];
        if (isset($_POST['payment']) && !empty($_POST['payment'])) {
            $payment_id = $_POST['payment'];
        }
        $customer_id = $_SESSION['customer']['id'];
        $promotion_id = isset($_SESSION['cart'][$customer_id]['promotion']['id']) ? $_SESSION['cart'][$customer_id]['promotion']['id'] : 0;
        if (isset($_POST['delivery']) && !empty($_POST['delivery'])) {
            $delivery = $_POST['delivery'];
        }
        $payments = $this->paymentModel->getPayments();


        if (empty($name_receive) || empty($phone_receive) || empty($address_receive) || empty($payment_id) || empty($delivery)) {
            $this->view(
                'main-layout',
                [
                    'pageName' => 'Thông tin thanh toán',
                    'page' => 'orders/pay',
                    'totalPrice' => $total,
                    'payments' => $payments,
                    'error' => 'Vui lòng nhập đầy đủ thông tin'
                ]
            );
        }

        $data = [
            'name_receive' => $name_receive,
            'phone_receive' => $phone_receive,
            'address_receive' => $address_receive,
            'note' => $note,
            'total' => $total - $transportFee,
            'promotion_id' => $promotion_id,
            'payment_id' => $payment_id,
            'customer_id' => $customer_id,
            'delivery' => $delivery
        ];
        $order_id = $this->orderModel->createOrder($data);
        $insertString = '';
        $list_idProduct = [];
        $list_quantityProduct = [];
        if (isset($_SESSION['cart'][$customer_id]['listProduct'])) {
            $listProduct = $_SESSION['cart'][$customer_id]['listProduct'];
            foreach ($listProduct as $key => $value) {
                $quantity = $value['quantity'];
                $list_quantityProduct[] = $value['quantity'];
                $sale_price = $value['sale_price'];
                $id = $value['id'];
                $list_idProduct[] = $value['id'];
                $insertString .= "($quantity, $sale_price, $id, $order_id)";
                if ($key !== array_key_last($listProduct)) {
                    $insertString .= ',';
                }
            }
        }


        for ($i = 0; $i < count($list_idProduct); $i++) {
            $product =  $this->productModel->getProduct($list_idProduct[$i]);
            $this->productModel->updateProduct($list_idProduct[$i], ['quantity' => $product['quantity'] - $list_quantityProduct[$i]]);
        }

        $sql = "INSERT INTO order_details(quantity, price, product_id, order_id) VALUES $insertString";
        $this->orderDetailModel->createOrderDetail($sql);

        unset($_SESSION['cart'][$customer_id]);

        $this->view(
            'main-layout',
            [
                'page' => 'orders/thank',
                'pageName' => 'Đặt hàng thành công',
                'order_id' => $order_id
            ]
        );
    }

    public function cancelOrder($id)
    {
        $data = ['status_order' => 3];
        $this->orderModel->updateOrder($id, $data);

        $orderDetails = $this->orderDetailModel->getOrderDetailByOrder($id);
        if (mysqli_num_rows($orderDetails) > 0) {
            while ($row = mysqli_fetch_array($orderDetails)) {
                $product =  $this->productModel->getProduct($row['product_id']);
                $this->productModel->updateProduct($row['product_id'], ['quantity' => $product['quantity'] + $row['quantity']]);
            }
        }

        header('Location:?url=order');
    }
}
