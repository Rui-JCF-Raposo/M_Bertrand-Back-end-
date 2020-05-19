<?php 
    
    $wishlist_books = $model->getWishlistBooks($_SESSION["user"]["user_id"], $list["list_id"]);


?>
<div class="test-list" data-listId="<?=$list["list_id"]?>">
    <header>
        <div class="list-name" data-listname="<?=$list["name"]?>">
        <?=$list["name"]?></span> <span class="clientList-items">(<?=count($wishlist_books)?>)</span>
        </div>
        <div class="openList-icon">
            <img src="icons/clientList_Icons/down-chevron.svg" alt="open list icon">
        </div>
    </header>
    <div class="list-container">
        <div class="list-options">
            <div>
                <div class="edit">
                    <img src="icons/clientList_Icons/pencil.svg" alt="edit icon">
                </div>
                <div class="delete">
                    <img src="icons/clientList_Icons/recycle-bin.svg" alt="delete icon">
                </div>
            </div>
            <div class="share-list">
                <a href="#">
                    <span>Partilhar a Lista</span>
                    <img src="icons/clientList_Icons/photo-symbol-to-share-with-right-arrow.svg"
                        alt="share list icon">
                </a>
            </div>
        </div>
        <div class="list-books" data-listname="<?=$list["name"]?>">
            <?php 
            
                foreach($wishlist_books as $book) 
                {
                    $comment = $model->getBookComment($_SESSION["user"]["user_id"], $list["list_id"], $book["book_id"]);
                    require("templates/book.php");
                }
            ?>
        </div>
    </div>
</div> <!-- end test list -->