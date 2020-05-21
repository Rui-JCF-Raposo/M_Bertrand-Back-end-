<?php


   if(isset($url_parts[3])) {

        $section = $url_parts[3];
        
        if($section === "userData") {

            require("views/clientLoggedIn/userData.php");

        }

   }