console.log("CheckOut Connected!");

let activeUser_CheckOut = JSON.parse(sessionStorage.getItem("activeUser"));
let usersArr_CheckOut = [];
if(sessionStorage.getItem("users")) {
    usersArr_CheckOut = JSON.parse(sessionStorage.getItem("users"));
}

const deliverTime = ["ENTREGA EM 24 HORAS", "ENTREGA IMEDIATA"];

let books = [];

function getBooks() {
    return new Promise((resolve, reject) => {
        fetch("../controllers/shoppingcart.php?getSession", {method: "GET"})
            .then(response => response.json())
            .then(data => {
                resolve(books = data);
                console.log(books);
            })
            .catch(err => reject(err))
    });
}


async function genarateCheckOutProducts() {
    await getBooks();
    let ebook = "";
    const checkOutProductsOutput = document.querySelector(".checkOut-products-output");
    let html = "";
    let html2 = "";
    let totalPrice = 0;;
    for(let i = 0; i < books.length; i++) {
        let deliverTimeSelected;
        if(books[i].category === "ebooks") {
            deliverTimeSelected = deliverTime[1];
        } else {
            deliverTimeSelected = deliverTime[0];
        }
        if(deliverTimeSelected == "ENTREGA IMEDIATA") {
            ebook ="(eBook)";
        }

        let coverPreFix = "";
        if(books[i].cover.substring(0, 4) !== "http") {
            coverPreFix = "../img/book-images/";
        }

        html = `
            <tr class="table-product-row">
                <td>
                    <div>
                        <img class="book-cover-img" src="${coverPreFix + books[i].cover}" alt="book cover">
                    </div>
                    <div class="table-book-info">
                        <div>
                            <span class="table-book-name"> ${books[i].title} ${ebook}</span>
                            <span class="deliver-time">${deliverTimeSelected}</span>
                        </div>
                        <div class="table-book-edit">
                            <a href="http://localhost/M_Bertrand-Back-end-/controllers/shoppingcart.php?sessionRemove&id=${books[i].book_id}&origin=checkout">
                                <span>REMOVER DO CESTO</span>
                            </a>
                        </div>
                    <div>
                </td>
                <td>
                    <div class="checkOut-controls">
                        <a href="http://localhost/M_Bertrand-Back-end-/controllers/shoppingcart.php?updateSession&quantity=remove&id=${books[i].book_id}&origin=checkout">
                            <img class="minus-quantity" src="../icons/clientLoggenIn_Icons/shopCart/minus.svg" alt="minus icon">
                        </a>
                        <span class="book-box-quanitity">${books[i].quantity}</span>
                        <a href="http://localhost/M_Bertrand-Back-end-/controllers/shoppingcart.php?updateSession&quantity=add&id=${books[i].book_id}&origin=checkout">
                            <img class="more-quantity" src="../icons/clientLoggenIn_Icons/shopCart/add.svg" alt="plus icon">
                        </a>
                    </div>
                </td>
                <td>
                    ${books[i].price}€
                </td>
            </tr>
        `;
        checkOutProductsOutput.innerHTML += html;
        ebook = "";
        totalPrice += books[i].quantity * books[i].price
    }
    html2 = `
        <tr class="table-product-row table-product-footer">
            <td colspan="3"></td>
            <td colspan="">TOTAL</td>
            <td class="checkOut-total">${totalPrice.toFixed(2)}€</td>
        </tr>
    `;
    checkOutProductsOutput.innerHTML += html2;
}


genarateCheckOutProducts();

/*
    A fazer:
            -> Criar visualização do total do checkout
*/


