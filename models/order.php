<?php 
    require("book.php");

    class Order extends Book {


        public function createOrder($user_id, $books) 
        {

            $orderTotalPrice = $this->calculateOrderPrice($books);

            if(
                empty($user_id) || 
                !is_numeric($user_id) && 
                empty($books)
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

        public function getUserOrders() 
        {

            $query = $this->db->prepare("
                SELECT 
                    o.order_id, o.paid, o.order_date, o.delivered_date, o.price, o.active, od.book_id,
                    SUM(od.quantity) AS quantity
                FROM 
                    orders AS o
                LEFT JOIN 
                    orders_details AS od USING(order_id)
                WHERE 
                    user_id = ? AND o.active = 1
                GROUP BY o.order_id
            ");

            $query->execute([$_SESSION["user"]["user_id"]]);
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        } 
        
        public function getOrderById($order_id) 
        {

            if(empty($order_id) || !is_numeric($order_id)) {
                return false;
            }

            $query = $this->db->prepare("
                SELECT 
                    o.order_id, od.price, o.active, od.book_id, od.quantity, b.title, b.cover
                FROM 
                    orders AS o
                INNER JOIN 
                    orders_details AS od USING(order_id)
                LEFT JOIN
                    books as b USING(book_id)
                WHERE 
                    user_id = ? AND o.active = 1 AND o.order_id = ?
            ");

            $query->execute([
                $_SESSION["user"]["user_id"],
                $order_id
            ]);

            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            return $data;

        }
        
        public function cancelOrder($order_id)
        {

            if(empty($order_id) || !is_numeric($order_id)) {
                return false;
            }

            $query = $this->db->prepare("
                UPDATE orders
                SET active = 0
                WHERE user_id = ? AND order_id = ?
            ");

            $query->execute([
                $_SESSION["user"]["user_id"],
                $order_id
            ]);

        }

    }