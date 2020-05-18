<?php 
    require("base.php");

    class Checkout extends Base {


        public function createOrder($user_id, $books) 
        {

            $orderTotalPrice = $this->calculateOrderPrice($books);

            if(
                empty($user_id) || 
                !is_numeric($user_id) && 
                !empty($books)
            ) {
                return false;
            }

            $query = $this->db->prepare("
                INSERT INTO orders
                (user_id, paid, price, active)
                VALUES(?, 0, ?, 1)
            ");

            $result = $query->execute([$user_id, $orderTotalPrice]);

            if(!$result) {
                return false;
            } else {
                $order_id = $this->db->lastInsertId();
                return $order_id;
            }

        } 

        public function createOrderDetails($order_id, $books) 
        {

            if(
                !empty($order_id) ||
                !empty($books) ||
                is_numeric($order_id) ||
                is_array($books)
            ) {

                foreach($books as $book) {

                    $priceByBookQuantity = $book["quantity"] * $book["price"];
                    
                    $query = $this->db->prepare("
                        INSERT INTO orders_details
                        (order_id, book_id, quantity, price)
                        VALUES(?, ?, ?, ?)
                    ");

                    $result = $query->execute([
                        $order_id, 
                        $book["book_id"],
                        $book["quantity"],
                        $priceByBookQuantity
                    ]);
                    
                    if(!$result) {
                        return false;
                    }
                
                }

                return true;

            } else {
                false;
            }

        }

        public function calculateOrderPrice($books) 
        {
            $total = 0;
            foreach($books as $book) {
                $total += $book["price"] * $book["quantity"];
            }
            return $total;
        }

    }