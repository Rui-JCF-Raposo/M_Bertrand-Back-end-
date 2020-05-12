<div class="book-box" data-id="${listBooksArr[i].id}">
    <div class="book-img-wrapper">
        <img class="book-image" src="${listBooksArr[i].cover}">
    <div class="add-to-shoppcart">CESTO</div>
    <div class="add-to-list">LISTA</div>
    <div class="book-price">${(Math.random() * 30).toFixed(2) + " €"}</div>
    <div class="remove-list-item">
        <img src="../../../icons/clientList_Icons/x-button.svg">
    </div>
    </div>
    <div class="product-info">
        <h2 class="book-title">${listBooksArr[i].title}</h2>
        <p class="book-authors">escrito por: <strong>${listBooksArr[i].authors[0]}</strong></p>
    </div>
    <button type="button" class="list-item-buy">COMPRAR</button>
    <button type="button" class="list-item-reserve">RESERVAR</button>
    <textarea class="book-coment" placeholder="Inserir comentário" data-id="${listBooksArr[i].id}"></textarea>
    <button type="button" class="save-comment d-none">GRAVAR</button>
</div>