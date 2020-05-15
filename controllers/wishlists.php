<?php   

    require("models/wishlist.php");
    $model = new Wishlist();

    if(isset($url_parts[2]) && isset($url_parts[3])) {
        
        $controller = $url_parts[2];
        $action = $url_parts[3];
        
        if($controller === "wishlists") {
            if($action === "add") {

                $user_id = $_SESSION["user"]["user_id"];
                $newListName = file_get_contents("php://input");
                $rowsAffected = $model->create($user_id, $newListName);

                if($rowsAffected > 0) {
                    header("HTTP/1.1 202 Accepted");
                    die("202 Accepted");
                } else {
                    header("HTTP/1.1 400 Bad Request");
                    die("400 Bad Request");
                }

            } else if($action === "edit") {

                $data = json_decode(file_get_contents("php://input"), true);
                $rowsAffected = $model->edit($data);

                if($rowsAffected > 0) {
                    header("HTTP/1.1 202 Accepted");
                    die("202 Accepted");
                } else {
                    header("HTTP/1.1 400 Bad Request");
                }

            }  else if($action === "remove") {
                if(isset($url_parts[4]) && is_numeric($url_parts[4])) {

                    $list_id = $url_parts[4];
                    $rowsAffected = $model->remove($list_id);

                    if($rowsAffected > 0) {
                        header("HTTP/1.1 202 Accepepted");
                        header("Location: ".BASE_PATH."wishlists");
                    } else {
                        header("HTTP/1.1 404 Not Found");
                        die("404 Not Found");
                    }
                    
                } else {
                    header("HTTP/1.1 400 Bad Request");
                    die("400 Bad Request");
                }
            }
            
        } 
    } else {

        $wishlists = $model->getLists($_SESSION["user"]["user_id"]);
        require("views/clientLoggedIn/clientList/clientList.php");
    }
    