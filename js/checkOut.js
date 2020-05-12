console.log("CheckOut Connected!");

let activeUser_CheckOut = JSON.parse(sessionStorage.getItem("activeUser"));
let usersArr_CheckOut = [];
if(sessionStorage.getItem("users")) {
    usersArr_CheckOut = JSON.parse(sessionStorage.getItem("users"));
}

const deliverTime = ["ENTREGA EM 24 HORAS", "ENTREGA IMEDIATA"];

function genarateCheckOutProducts() {
    let ebook = "";
    const checkOutProductsOutput = document.querySelector(".checkOut-products-output");
    let html = "";
    let html2 = "";
    for(let i = 0; i < activeUser_CheckOut.shoppcart.length; i++) {
        let deliverTimeSelected = deliverTime[Math.floor(Math.random() * 2)];
        console.log(deliverTimeSelected);
        if(deliverTimeSelected == "ENTREGA IMEDIATA") {
            ebook ="(eBook)";
        }
        html = `
            <tr class="table-product-row">
                <td>
                    <div>
                        <img class="book-cover-img"src="${activeUser_CheckOut.shoppcart[i].book.cover}" alt="book cover">
                    </div>
                    <div class="table-book-info">
                        <div>
                            <span class="table-book-name">${activeUser_CheckOut.shoppcart[i].book.title} ${ebook}</span>
                            <span class="deliver-time">${deliverTimeSelected}</span>
                        </div>
                        <div class="table-book-edit">
                            <span>REMOVER DO CESTO</span>
                            <span>ENVIAR PARA A LISTA</span>
                        </div>
                    <div>
                </td>
                <td>
                    <div class="checkOut-controls">
                        <img class="minus-quantity" src="../../../icons/clientLoggenIn_Icons/shopCart/minus.svg" alt="minus icon">
                        <span class="book-box-quanitity">${activeUser_CheckOut.shoppcart[i].quantity}</span>
                        <img class="more-quantity" src="../../../icons/clientLoggenIn_Icons/shopCart/add.svg" alt="plus icon">
                    </div>
                </td>
                <td>
                    ${activeUser_CheckOut.shoppcart[i].book.price}€
                </td>
            </tr>
        `;
        checkOutProductsOutput.innerHTML += html;
        ebook = "";
    }
    html2 = `
        <tr class="table-product-row table-product-footer">
            <td colspan="3"></td>
            <td colspan="">TOTAL</td>
            <td class="checkOut-total">0</td>
        </tr>
    `;
    checkOutProductsOutput.innerHTML += html2;
}

genarateCheckOutProducts();

/*
    A fazer:
            -> Criar visualização do total do checkout
*/


