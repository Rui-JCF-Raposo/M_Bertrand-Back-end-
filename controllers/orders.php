<?php 

    if(!isset($_SESSION["user"])) {
        header("Location: ".BASE_PATH."login");
        exit;
    }
    
    require("models/order.php");
    $orderModel = new Order();
    
    $categories = $orderModel->getCategories();
    $orders = $orderModel->getUserOrders();

    if($_SERVER["REQUEST_METHOD"] === "PUT") {
        
        $data = file_get_contents("php://input");
        $orderModel->cancelOrder((int)$data);
        die(json_encode(["message" => "Update Successfully"]));
        
    }

    if(
        isset($url_parts[3]) && 
        isset($url_parts[4]) && 
        $url_parts[3] === "details"  
    ) {

        $order_id = (int)$url_parts[4];
        $order_details = $orderModel->getOrderById($order_id);
        if($order_details) {
            require("views/clientLoggedIn/orderDetails.php");
        }


        exit;

    }
    

        
    require("views/clientLoggedIn/userOrders.php");
