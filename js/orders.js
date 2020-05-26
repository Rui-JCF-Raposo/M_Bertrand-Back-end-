console.log("Orders JS Connected!");

const cancel_order_btns = document.querySelectorAll(".cancel-order");

cancel_order_btns.forEach((btn) => {
    btn.addEventListener("click", (e) => {

        if(!confirm("Tem a certeza que pertende cancelar?")) {
            return;
        }
        
        const order_id = e.target.parentElement.parentElement.dataset.order_id;
        const data = {
            action: "cancel_order",
            order_id: order_id
        }

        fetch("orders", {
            method: "PUT",
            headers: {
                "Content-Type": "text/plain"
            },
            body: JSON.stringify(data)
        })
        .then(res => res.json())
        .then(data => {
            if(data.message === "Update Successfully") {
                const order_tr = e.target.parentElement.parentElement;
                order_tr.remove();
            }
        }) 
        ;

    });
});


const change_quantity_icons = document.querySelectorAll(".change-quantity");
change_quantity_icons.forEach((icon) => {
    icon.addEventListener("click", (e) => {
                
        let action;
        let quantity;
        let order_id;
        let book_id;

        const price = e.target.parentElement.parentElement.nextElementSibling;

        if(e.target.classList.contains("add-quantity")) {
            action = "add_quantity";
            quantity = e.target.previousElementSibling.textContent;
            quantity++;
            order_id = e.target.previousElementSibling.dataset.order_id;
            book_id = e.target.previousElementSibling.dataset.book_id;
        } else if (e.target.classList.contains("less-quantity")) {
            action = "less_quantity";
            quantity = e.target.nextElementSibling.textContent;
            if(Number(quantity) > 0) {
                quantity--;
            } 
            order_id = e.target.nextElementSibling.dataset.order_id;
            book_id = e.target.nextElementSibling.dataset.book_id;
        }

        if(quantity === 0) {
            return;
        }

        const data = {
            action: action,
            quantity: quantity,
            order_id: order_id,
            book_id: book_id
        };

        fetch("/M_Bertrand-Back-end-/orders", {
            method: "PUT",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        })
            .then(res => res.json())
            .then(data => {

                if(data.message === "Update Successfully") {
                    if(action === "add_quantity") {
                        e.target.previousElementSibling.textContent = quantity;
                    } else if(action === "less_quantity") {
                        if(quantity > 0) {
                            e.target.nextElementSibling.textContent = quantity
                        } 
                    }
                    
                    if(data.new_total_price) {
                        price.textContent = data.new_total_price + "€"; 
                    }
                }
            });
        ;
    });
});

const remove_books = document.querySelectorAll(".remove-order-book");
remove_books.forEach((book) => {
    book.addEventListener("click", (e) => {

        if(!confirm("Tem a certeza que pertende cancelar?")) {
            return;
        }
        
        const table_tr = e.target.parentElement.parentElement.parentElement.parentElement.parentElement; 
        const book_id = e.target.parentElement.dataset.book_id
        const order_id = e.target.parentElement.dataset.order_id
        
        const data = {
            book_id: book_id ,
            order_id: order_id
        }

        fetch("/M_Bertrand-Back-end-/orders", {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        })
            .then(res => res.json())
            .then(data => {
                if(data.message === "Successfully Deleted") {
                    table_tr.remove();
                }
            })
        ;

    });
});
