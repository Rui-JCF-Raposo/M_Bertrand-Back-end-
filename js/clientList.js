console.log("List Page Connected!!!!!");
/*-------------------------------------------------------------------------------*/
/*------------------Mark wich user is logged and import is data------------------*/
/*-------------------------------------------------------------------------------*/



/*-------------------------------------------------------------------------------*/
/*------------------Making fundamental data imports------------------------------*/
/*-------------------------------------------------------------------------------*/
//Importing book name from wish list added books 




/*-----------------------------------------------------------------*/
/*----------LIST EVENTS AND MANIPULATION---------------------------*/
/*-----------------------------------------------------------------*/
const removeListItem = document.querySelector(".remove-list-item");


class DisplayWishList {

    // displayBooks = function (listArr) {
    //   // fetch books inside wishlist from DB
    //     let booksHtml = "";
    //         for (let i = 0; i < listBooksArr.length; i++) {
    //           booksHtml += `
    //           <div class="book-box" data-id="${listBooksArr[i].id}">
    //             <div class="book-img-wrapper">
    //               <img class="book-image" src="${listBooksArr[i].cover}">
    //               <div class="add-to-shoppcart">CESTO</div>
    //               <div class="add-to-list">LISTA</div>
    //               <div class="book-price">${(Math.random() * 30).toFixed(2) + " €"}</div>
    //               <div class="remove-list-item">
    //                 <img src="../../../icons/clientList_Icons/x-button.svg">
    //               </div>
    //             </div>
    //             <div class="product-info">
    //               <h2 class="book-title">${listBooksArr[i].title}</h2>
    //               <p class="book-authors">escrito por: <strong>${listBooksArr[i].authors[0]}</strong></p>
    //             </div>
    //             <button type="button" class="list-item-buy">COMPRAR</button>
    //             <button type="button" class="list-item-reserve">RESERVAR</button>
    //             <textarea class="book-coment" placeholder="Inserir comentário" data-id="${listBooksArr[i].id}"></textarea>
    //             <button type="button" class="save-comment d-none">GRAVAR</button>
    //           </div>
    //         `;

    //         let listBooksContainer = document.querySelectorAll(".list-books");
    //         for (let i = 0; i < listBooksContainer.length; i++) {
    //           if (listBooksContainer[i].dataset.listname == listArr.name) {
    //             listBooksContainer[i].innerHTML = booksHtml;
    //           }
    //         }
    //       }

    // }

    addBook = (book) => {
        let listBooksContainer = document.querySelectorAll(".list-books");
        const bookHtml = `
      <div class="book-box" data-id="${book.id}">
          <div class="book-img-wrapper">
            <img class="book-image" src="${book.cover}">
            <div class="add-to-shoppcart">CESTO</div>
            <div class="add-to-list">LISTA</div>
            <div class="book-price">${(Math.random() * 30).toFixed(2) + " €"}</div>
            <div class="remove-list-item">
              <img src="../../../icons/clientList_Icons/x-button.svg">
            </div>
          </div>
          <div class="product-info">
            <h2 class="book-title">${book.title}</h2>
            <p class="book-authors">escrito por: <strong>${book.authors[0]}</strong></p>
          </div>
          <button type="button" class="add-to-shoppcart">COMPRAR</button>
          <button type="button" class="list-item-reserve">RESERVAR</button>
          <textarea class="book-coment" placeholder="Inserir comentário" data-id="${book.id}"></textarea>
          <button type="button" class="save-comment d-none">GRAVAR</button>
      </div>
    `
        listBooksContainer.innerHTML += bookHtml;
    }

    addList = (list, list_id) => {
        let listsContainer = document.getElementById("clientLists");
        const listHtml = `
          <div class="test-list" data-listId="${list_id}">
              <header>
                <div class="list-name" data-listname="${list}">
                  ${list}</span> <span class="clientList-items">(0)</span>
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
                <div class="list-books" data-listname="${list}">
                </div>
              </div>
          </div> <!-- end test list -->
      `;
        listsContainer.innerHTML += listHtml;
    }
}

// wish list class

const wishList = new DisplayWishList();
//wishList.displayLists();



function toggleShowList() {
    const listHeaders = document.querySelectorAll(".test-list header");
    const listContainers = document.querySelectorAll(".list-container");
    const listIcons = document.querySelectorAll(".openList-icon img");
    let isListOpen = false;

    //Loop to make lists closed by default
    listContainers.forEach((listContainer) => {
        listContainer.style.display = "none";
    });

    //loop to ajust closed list icons
    listIcons.forEach((icon) => {
        icon.src = "icons/clientList_Icons/right-chevron.svg";
    });

    //Loop to toggle list close/open
    listHeaders.forEach((list) => {
        list.addEventListener("click", function (e) {
            const listContainer = e.target.nextElementSibling;
            const listIcon = e.target.children[1].firstElementChild;
            if (isListOpen == true) {
                listContainer.style.display = "none";
                listContainer.classList.remove("list-container-effect");
                isListOpen = false;
                listIcon.src = "icons/clientList_Icons/right-chevron.svg";
            } else {
                listContainer.classList.add("list-container-effect");
                listContainer.style.display = "block";
                isListOpen = true;
                listIcon.src = "icons/clientList_Icons/down-chevron.svg";
            }
        });
    });
}
function enableRemoveBook() {
    const removeBook = document.querySelectorAll(".remove-list-item img");
    removeBook.forEach((book) => {
        book.addEventListener("click", (e) => {
            const spanItems = e.target.parentNode.parentNode.parentNode.parentNode.parentNode.previousElementSibling.firstElementChild.querySelector("span");
            console.log("Book remove clicked");
            book.parentNode.parentNode.parentNode.remove();
            const book_id = book.parentNode.parentNode.parentNode.dataset.id;
            const list_id = book.parentNode.parentNode.parentNode.dataset.listid;
            console.log("List id:> ", list_id);
            spanItems.textContent = "(" + (Number(spanItems.textContent[1]) - 1) + ")";
            const book_data = {
                book_id: book_id,
                list_id: list_id
            }
            fetch(window.location.href+"/removeBook", {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                method: "POST",
                body: JSON.stringify(book_data)
            });
        });
    });
}

function enableCommentSaveBtns() {
    const commentArea = document.querySelectorAll(".book-coment");
    const saveBtns = document.querySelectorAll(".save-comment");

    commentArea.forEach((comment) => {
        //Event to show save btn
        comment.addEventListener("keyup", (e) => {
            console.log("keyup works");
            const currentSaveBtn = e.target.nextElementSibling;
            currentSaveBtn.classList.add("save-btn-effect");
            currentSaveBtn.classList.remove("d-none");
        });
        //Event to hide save btn
        comment.addEventListener("blur", (e) => {
            const currentSaveBtn = e.target.nextElementSibling;
            currentSaveBtn.classList.add("save-btn-effect");
            currentSaveBtn.classList.add("d-none");
        });
    });
}


function enableListEdit() {

    const editListBtns = document.querySelectorAll(".edit");
    if (editListBtns) {
        editListBtns.forEach((editListBtn) => {
            editListBtn.addEventListener("click", (e) => {
                const listName = e.target.parentNode.parentNode.parentNode.parentNode.previousElementSibling.firstElementChild;
                const listItemsQuantity = e.target.parentNode.parentNode.parentNode.nextElementSibling.children.length;
                const newName = prompt("Defina um novo nome à sua lista");
                if (newName !== null && newName !== "") {
                    listName.innerHTML = `${newName} <span class="clientList-items">(${listItemsQuantity})</span>`;
                    // send new wishlist data to php, it needs the list id to
                    const listId = e.target.parentNode.parentNode.parentNode.parentNode.parentNode.dataset.listid;
                    newName, listId;
                    const listData = {
                        list_id: listId,
                        name: newName
                    }
                    fetch(window.location.href + "/edit", {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        method: "POST",
                        body: JSON.stringify(listData)
                    });
                }
            });
        });
    }
}

function getLastId() {
    return new Promise((resolve, reject) => {
        fetch(window.location.href + "/getLastId")
            .then(res => res.json())
            .then(data => resolve(data))
            .catch(err => reject(err))
        ;
        
    })
;
}

function enableRemoveList() {

    const removeListBtns = document.querySelectorAll(".delete");

    if (removeListBtns) {
        //event to remove intire list from wishlist
        removeListBtns.forEach((removeBtn) => {
            removeBtn.addEventListener("click", function (e) {
                const list = e.target.parentNode.parentNode.parentNode.parentNode.parentNode;
                list.remove();
                const listId = e.target.parentNode.parentNode.parentNode.parentNode.parentNode.dataset.listid;
                fetch(window.location.href + "/remove/" + listId, {method: "GET"});
            });
        });
    }
}

function importShopcartScript() {

    const html = document.querySelector("html");
    const script = document.createElement("script")

    script.classList.add("shopcart-script-import");
    script.src = "../../../js/shoppingCart.js";

    const oldScript = document.querySelector(".shopcart-script-import");
    if (oldScript) {
        html.replaceChild(script, oldScript)
    } else {
        html.appendChild(script);
    }

}



//Create new list from wish list page
const createListBtn = document.querySelector(".create-list-btn");

if(createListBtn) {
    createListBtn.addEventListener("click", async function () {
        const listName = prompt("List Name");
        if(listName === "" || listName === null) {
            return;
        }
        await fetch(window.location.href + "/add", {
            headers: {
                'Accept': 'text/html',
                'Content-Type': 'text/html'
            },
            method: "POST",
            body: listName
        });
        const last_id = await getLastId();
        list_id = last_id.list_id;
        //To don't repeat previous ID
        // if(firstListAdd) {
        //     list_id++;
        //     firstListAdd = false;
        // }
        console.log(list_id); 
        wishList.addList(listName, list_id);
        toggleShowList();
        enableListEdit();
        enableRemoveList();
        enableCommentSaveBtns();
        enableRemoveBook();
        importShopcartScript();
    });
    
    toggleShowList();
    enableListEdit();
    enableRemoveList();
    enableCommentSaveBtns();
    enableRemoveBook();
}



let addFromModalBtns = document.querySelectorAll(".list-item-btn");
let addBookToWishlistFromModal = () => {
    let addFromModalBtns = document.querySelectorAll(".list-item-btn");
    console.log("Rep works");
    addFromModalBtns.forEach((addButton) => {
        addButton.addEventListener("click", (e) => {
            const list_id = Number(e.target.dataset.listid);
            const book_id = Number(JSON.parse(sessionStorage.getItem("bookToAddToWishList")));
            console.log("Book Id -> ", book_id);
            console.log("List Id -> ", list_id);
            const book_data = {
                book_id: book_id,
                list_id: list_id 
            }
            fetch("http://localhost/M_Bertrand-Back-end-/wishlists/addBook", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(book_data)
            });
            alert("Book Added to list");
        });
    });
}

if(addFromModalBtns) {
    addBookToWishlistFromModal();
}




