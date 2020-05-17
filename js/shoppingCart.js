console.log("Shopping Cart Connected!");

/*------------------------------------------------------------------*/
/*----------Adding book to shop cart from wishList-------------------*/
/*------------------------------------------------------------------*/
if(!scriptRunned) {
    
    books = [];


    let pathPreFix = "../";
    if(
        window.location.href === "http://localhost/M_Bertrand-Back-end-/home" ||
        window.location.href === "http://localhost/M_Bertrand-Back-end-/dashboard" ||
        window.location.href === "http://localhost/M_Bertrand-Back-end-/wishlists" 
    ) {
        pathPreFix = "";
    } 

    function getBooks() {
        fetch(pathPreFix + "controllers/shoppingcart.php?getSession", {method: "GET"})
            .then(response => response.json())
            .then(data => {
                books = data;
                addShopcartFooter();
            })
    }

    getBooks();

    //buyBookEvent();


    function buyBookEvent() {
        const categoriesBuyBtns = document.querySelectorAll(".add-to-shoppcart");
        categoriesBuyBtns.forEach((buyBtn) => {
            buyBtn.addEventListener("click", async (e) => {
                const bookId = e.target.parentNode.parentNode.dataset.id;
                if(bookRepetition(bookId)) {
                    alert("Already on shopping cart");
                    return;
                }
                const book = await getBookFromDB(bookId);
                //addBookToShopCartMenu(book);
                addBookToShopcart(book);
                //Send data to back-end to add shopcart to SESSION
                fetch("../controllers/shoppingcart.php?addBook=true", {
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    method: "POST",
                    body: JSON.stringify(book)
                });
            });
        });
    }

    function bookRepetition(bookId) {
        for(let book of books) {
            if(book.book_id === bookId) {
                return true;
            }
        }
        return false;
    }

    const getBookFromDB = (id) => {
        return new Promise((resolve, reject) => {
            fetch(id, {method: "GET"})
                .then(response => response.json())
                .then(data => resolve(data))
                .catch(err => reject(err));
            ;
        });
    }

    function addBookToShopcart(book) {

        activeShopcart();
        
        book.quantity = 1;
        books.push(book);
        
        const shopcartContainer = document.querySelectorAll(".shopcart-container")[0];
    
        const bookHtml = `
            <div>
                <div class="shoppcart-book-box" data-bookid="${book.book_id}">
                    <div class="shoppcart-book-img">
                        <img src="${book.cover}">
                    </div>
                    <div class="book-box-info">
                        <div>
                            <dl>
                                <dt class="shop-book-box-title">${book.title}</dt>
                                <dd class="shop-book-box-price">${book.price}€</dd>
                            </dl>
                        </div>
                        <div class="book-box-info2">
                            <div class="book-box-quantity-controls">
                                <img class="minus-quantity" src="../icons/clientLoggenIn_Icons/shopCart/minus.svg" alt="minus icon">
                                <span class="book-box-quanitity">${book.quantity}</span>
                                <img class="more-quantity" src="../icons/clientLoggenIn_Icons/shopCart/add.svg" alt="plus icon">
                            </div>
                            <span class="shop-book-box-delete">
                                <img src="../icons/clientLoggenIn_Icons/shopCart/delete.svg">
                            </span>
                        </div>
                    </div>
                </div>
                <hr class="shoppcart-book-box-hr">
            </div>
        `
        shopcartContainer.innerHTML += bookHtml;

        addShopcartFooter();
        shopCartManagementEvents();
    }

    const addShopcartFooter = () => {
        
        // Calculate shopcart total price
        const totalPrice = calculateShopcartTotalPrice();
        
        // Get shopcart total Items;
        let totalItems = calculateShopcartTotalItems();
        const shopCartFooterContainer= document.querySelector(".shopcart-checkout");
        const footerHtml = `
            <div class="shoppcart-footer">
                <div class="shoppcart-total-info">
                    <span class="shoppcart-total-items">${totalItems}</span><span>ITENS/TOTAL</span>
                    <span class="shoppcart-total-price">${totalPrice}</span> € 
                </div>
                <a class="checkout-anchor" href="/M_Bertrand-Back-end-/checkout/">
                    <button type="button" class="shoppcart-checkout">CHECKOUT</button>
                </a>
            </div>
        `
        shopCartFooterContainer.innerHTML = footerHtml;
    }

    const calculateShopcartTotalItems = () => {

        const shopcartItemsInfo = document.querySelector(".shopcart-items-quantitiy");

        let totalItems = 0;
        for(let book of books) {
            totalItems += book.quantity;
        }

        shopcartItemsInfo.textContent = totalItems;

        return totalItems;
    }

    const calculateShopcartTotalPrice = () => {
        let totalPrice = 0;
        for(let book of books) {
            totalPrice += book.price * book.quantity;
            totalPrice = parseFloat(totalPrice);
        }
        if(books.length < 1) {
            totalPrice = 0
        }
        return totalPrice;
    }

    function getChosenBook(bookId) {
        return new Promise((resolve, reject) => {
            let chosenBook = sessionBooks.find((book) => {
                if(book.id === bookId) {
                    return book.id;
                }
            });
            if(chosenBook) {
                resolve(chosenBook)
            } else {
                reject(false);
            }
        });

    }

    let preFix = ""
    if(window.location.href !== "http://localhost/M_Bertrand-Back-end-/") {
        preFix = "http://localhost/M_Bertrand-Back-end-/";
    }

    function updateMoreQuantity(e) {
        const bookId = e.target.parentNode.parentNode.parentNode.parentNode.dataset.bookid;
        const bookPrice = Number(e.target.parentNode.parentNode.parentNode.firstElementChild.firstElementChild.firstElementChild.nextElementSibling.textContent.replace("€", ""));
        let itemQuantity = e.target.previousElementSibling;
        itemQuantity.textContent++;
        updateActiveUserShopCart(bookId, "moreQuantity", bookPrice);
        const totalItems = calculateShopcartTotalItems();
        const shopcartFooterTotalItems = document.querySelector(".shoppcart-total-items");
        shopcartFooterTotalItems.textContent = totalItems;
        // Make fetch do php to update book quantity session
        fetch(preFix+"controllers/shoppingcart.php?updateSession&quantity=add&id="+bookId);
    }

    function updateMinusQuantity(e) {
        const bookId = e.target.parentNode.parentNode.parentNode.parentNode.dataset.bookid;
        const bookPrice = Number(e.target.parentNode.parentNode.parentNode.firstElementChild.firstElementChild.firstElementChild.nextElementSibling.textContent.replace("€", ""));
        let itemQuantity = e.target.nextElementSibling;
        if (Number(itemQuantity.textContent) > 0) {
            itemQuantity.textContent--;
            updateActiveUserShopCart(bookId, "minusQuantity", bookPrice);
            const totalItems = calculateShopcartTotalItems();
            const shopcartFooterTotalItems = document.querySelector(".shoppcart-total-items");
            shopcartFooterTotalItems.textContent = totalItems;
            // Make fetch do php to update book quantity session
            fetch(preFix+"controllers/shoppingcart.php?updateSession&quantity=remove&id="+bookId);
        }
    }

    function updateRemoveBook(e) {
        const bookId = e.target.parentNode.parentNode.parentNode.parentNode.dataset.bookid;
        const bookContainer = e.target.parentNode.parentNode.parentNode.parentNode.parentNode;
        const index = books.findIndex((book) => book.book_id == bookId);
        updateActiveUserShopCart(bookId, "removeBook");
        books.splice(index, 1);
        bookContainer.remove();
        if(!books[0]) {
            clearShopcart();
        }
        const totalItems = calculateShopcartTotalItems();
        const shopcartFooterTotalItems = document.querySelector(".shoppcart-total-items");
        shopcartFooterTotalItems.textContent = totalItems;
        // Remove Book From Session
        fetch(preFix+"controllers/shoppingcart.php?sessionRemove&id="+bookId);
    }
    /*-------------------------Managing Shopping Cart Items-----------------------------*/
    /*----------------------------------------------------------------------------------*/

    function shopCartManagementEvents() {
        const removeBookFromShopCart = document.querySelectorAll(".shop-book-box-delete img");
        const minusQuantity = document.querySelectorAll(".minus-quantity");
        const moreQuantity = document.querySelectorAll(".more-quantity");
        moreQuantity.forEach((moreIcon) => {
            moreIcon.addEventListener("click", function (e) {
                updateMoreQuantity(e);
            });
        });
        minusQuantity.forEach((minusIcon) => {
            minusIcon.addEventListener("click", function (e) {
                updateMinusQuantity(e);
            });
        });
        removeBookFromShopCart.forEach((removeBook) => {
            removeBook.addEventListener("click", function (e) {
                updateRemoveBook(e);
            });
        });


    }
    function updateActiveUserShopCart(bookId, condition, bookPrice) {
        

        const shopCartTotalPriceDIV = document.querySelector(".shoppcart-total-price");
        
        if (condition == "moreQuantity") {
            const oldPrice = Number(shopCartTotalPriceDIV.textContent.replace("€", ""));
            shopCartTotalPriceDIV.textContent = parseFloat(oldPrice + bookPrice).toFixed(2);
            for(let book of books) {
                if(book.book_id == bookId) {
                    book.quantity++;
                }
            }
            
        } else if (condition == "minusQuantity") {
            const oldPrice = Number(shopCartTotalPriceDIV.textContent.replace("€", ""));
            if (oldPrice > 0) {
                shopCartTotalPriceDIV.textContent = parseFloat(oldPrice - bookPrice).toFixed(2);
                for(let book of books) {
                    if(book.book_id == bookId) {
                        if(book.quantity > 0) {
                            book.quantity--;
                        }
                    }
                }
            }
        } else if (condition == "removeBook") {
            let totalReduction = 0;
            for(let book of books) {
                if(book.book_id == bookId) {
                    totalReduction += book.price * book.quantity;
                }
            }

            if(books.length < 1) {
                shopCartTotalPriceDIV.textContent = 0;
            }

            if(Number(shopCartTotalPriceDIV.textContent) > 0 ) {
                shopCartTotalPriceDIV.textContent = parseFloat(Number(shopCartTotalPriceDIV.textContent) - totalReduction).toFixed(2);
            } 
        }
    }


    const clearShopcart = () => {
        

        const container = document.querySelector(".shopcart-container");
        const checkout = document.querySelector(".shopcart-checkout");
        const chestState = document.querySelector(".chest-state");
        
        container.classList.add("hide");
        checkout.classList.add("hide");
        chestState.classList.remove("hide");
    }

    const activeShopcart = () => {
        
        const container = document.querySelector(".shopcart-container");
        const checkout = document.querySelector(".shopcart-checkout");
        const chestState = document.querySelector(".chest-state");
        
        container.classList.remove("hide");
        checkout.classList.remove("hide");
        chestState.classList.add("hide");
    }

    shopCartManagementEvents();

} else {

    buyBookEvent();
}

var scriptRunned = true;