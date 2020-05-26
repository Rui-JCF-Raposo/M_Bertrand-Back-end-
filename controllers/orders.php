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
        
        $data = json_decode(file_get_contents("php://input"), true);



        if($data["action"] === "cancel_order") {
            $result = $orderModel->cancelOrder((int)$data["order_id"]);
        } else if($data["action"] === "add_quantity" || $data["action"] === "less_quantity") {
            $result = $orderModel->updateOrderQuantity($data);
            if($result) {
                $new_price =  $orderModel->calculateTotalOrderPrice($data["order_id"]);
                $result_2 = $orderModel->updateOrderPrice($data["order_id"], $new_price);
                if(!$result_2) {
                    header("HTTP/1.1 400 Bad Request");
                    die(json_encode(["message" => "Update Unsucessful"]));
                } 
            }
        }
        
        if($result === true ) {
            header("HTTP/1.1 202 Accepted");
            die(json_encode(["message" => "Update Successfully"]));
        } else if(is_numeric($result)) { 
            header("HTTP/1.1 202 Accepted");
            die(json_encode(["message" => "Update Successfully", "new_total_price" => $result]));
        } else {
            header("HTTP/1.1 400 Bad Request");
            die(json_encode(["message" => "Update Unsucessful"]));
        }
        
    }

    if($_SERVER["REQUEST_METHOD"] === "DELETE") {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $orderModel->deleteBookFromOrder($data);

        // When deleting a book, check if order is empty. If it is, then delete order
        if($result) {

            $order_status = $orderModel->getOrderById($data["order_id"]);
            if(empty($order_status)) {
                $orderModel->deleteOrder($data["order_id"]);
            }

        }
    
        if($result) {
            header("HTTP/1.1 202 Accepted");
            die(json_encode(["message" => "Successfully Deleted"]));
        } else {
            header("HTTP/1.1 400 Bad Request");
            die(json_encode(["message" => "Unsucessfully Deleted"]));
        }
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
        } else if($order_id > 0){
            header("HTTP/1.1 404 Not Found");
            die("404 Not Found");
        } else {
            header("HTTP/1.1 400 Bad Request");
            die("400 Bad Request");
        }


        exit;

    }
        
    require("views/clientLoggedIn/userOrders.php");
