<?php 
    $category = $url_parts[3];
?>
<div class="add-modal d-none">
    <div class="add-to-list-modal">
        <header>
            <div class="brand">
                <img src="../../../logo/book.svg" alt="logo">
                <div class="brand-name">
                    <h1>MYPROJECT</h1>
                    <h1><span>Livreiros</span></h1>
                </div>
            </div>
            <div>
                <a href="<?=BASE_PATH."books/".$category?>" class="close-add-modal">
                    <img class="close-icon" src="../icons/close.svg" alt="close client area">
                </a>
            </div>
        </header> <!-- end header -->
        <div class="modal-info">
            <img src="../icons/clientLoggenIn_Icons/wish-list.svg" alt="">
            <h1>ADICIONAR À LISTA DE DEJOS</h1>
        </div>
        <div class="userLists">
            <?php foreach($wishlists as $list) { ?> 
                <button class="list-item-btn" data-listid="<?=$list["list_id"]?>"><?=$list["name"]?></button>
            <?php } ?>
        </div>
        <button class="create-new-list">CRIAR NOVA LISTA</button>
    </div>
</div>