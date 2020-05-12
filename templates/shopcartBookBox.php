<div>
    <div class="shoppcart-book-box" data-bookid="${activeUser_ShopData.shoppcart[i].book.id}">
        <div class="shoppcart-book-img">
            <img src="${activeUser_ShopData.shoppcart[i].book.cover}">
        </div>
        <div class="book-box-info">
            <div>
                <dl>
                    <dt class="shop-book-box-title">${activeUser_ShopData.shoppcart[i].book.title}</dt>
                    <dd class="shop-book-box-price">${activeUser_ShopData.shoppcart[i].book.price}€</dd>
                </dl>
            </div>
            <div class="book-box-info2">
                <div class="book-box-quantity-controls">
                    <img class="minus-quantity" src="../../../icons/clientLoggenIn_Icons/shopCart/minus.svg" alt="minus icon">
                    <span class="book-box-quanitity">${activeUser_ShopData.shoppcart[i].quantity}</span>
                    <img class="more-quantity" src="../../../icons/clientLoggenIn_Icons/shopCart/add.svg" alt="plus icon">
                </div>
                <span class="shop-book-box-delete">
                    <img src="../../../icons/clientLoggenIn_Icons/shopCart/delete.svg">
                </span>
            </div>
        </div>
    </div>
    <hr class="shoppcart-book-box-hr">
</div>