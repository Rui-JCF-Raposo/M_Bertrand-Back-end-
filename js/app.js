console.log("Connected!!");

/*---------------------------------------------------------------*/
/*---------------------GLOBAL VARIABLES--------------------------*/
/*---------------------------------------------------------------*/
let booksDataBase = [];
if (sessionStorage.getItem("books")) {
    booksDataBase = JSON.parse(sessionStorage.getItem("books"));
}


let clientLoggedIn = false;
const googleBooksApiKey = "AIzaSyDI1KEH8Z6g1FhtCn_0KULtZG_oaLUS3M4";

/*---------------------------------------------------------------*/
/*---------------------HOMEPAGE SLIDER LOGIC---------------------*/
/*---------------------------------------------------------------*/
const sliderContainer = document.querySelector(".slider-container");
const sliderImgs = document.querySelector(".slider-imgs");
const nextImgSlide = document.querySelector(".next-img-slide");
const prevImgSlide = document.querySelector(".prev-img-slide");
let imgPosition = 0;

if (sliderImgs) {
    let slideImgSize = sliderImgs.children[imgPosition].clientWidth;

    nextImgSlide.onclick = function () {
        slideImgSize = sliderImgs.children[imgPosition].clientWidth;
        imgPosition++;
        if (imgPosition == sliderImgs.children.length) {
            imgPosition = 0;
        }
        sliderImgs.style.transition = "transform .4s ease-in";
        sliderImgs.style.transform = "translateX(" + (-slideImgSize * imgPosition) + "px)";
        console.log(slideImgSize);
    }

    prevImgSlide.onclick = function () {
        slideImgSize = sliderImgs.children[imgPosition].clientWidth;
        imgPosition--;
        if (imgPosition < 0) {
            imgPosition = sliderImgs.children.length - 1;
        }
        sliderImgs.style.transition = "transform .4s ease-in";
        sliderImgs.style.transform = "translateX(" + (-slideImgSize * imgPosition) + "px)";
    }
}

/*---------------------------------------------------------------*/
/*---------------REQUEST BOOKS FOR HOME PAGE---------------------*/
/*---------------------------------------------------------------*/
const newBooksDiv = document.querySelector(".new-books");
const preReleasesDiv = document.querySelector(".pre-releases");
const spanishBooksDiv = document.getElementById("spanish-books");
const englishBooksDiv = document.getElementById("english-books");
const frenchBooksDiv = document.getElementById("french-books");
const ebooksDiv = document.getElementById("ebooks-div");
const textBooksDiv = document.getElementById("text-books");

/*---------------------------------------------------------------*/
/*---------------RESPONSIVE CATEGORIES SECTION-------------------*/
/*---------------------------------------------------------------*/
const categoriesSection = document.querySelector(".categories-col-10");
const hamburguerMenu = document.querySelector(".hamburguer-menu");
if (hamburguerMenu) {
    hamburguerMenu.addEventListener("click", function () {
        categoriesSection.classList.toggle("d-block");
        //console.log(categoriesSection);
    });
}


/*-----------------------------------------------------------------*/
/*--------------STORING WISH LIST BOOKS----------------------------*/
/*-----------------------------------------------------------------*/
const addModal = document.querySelector(".add-modal");


setTimeout(function () {
    const addToList = document.querySelectorAll(".add-to-list");
    addToList.forEach(function (addItem) {
        //genarateUserListsButtons();
        addItem.addEventListener("click", function (e) {
            addModal.classList.remove("d-none");
            const bookId = Number(e.target.parentNode.parentNode.dataset.id);
            sessionStorage.setItem("bookToAddToWishList", JSON.stringify(bookId))
            console.log("sessionId -> ", sessionStorage.getItem("bookToAddToWishList"));
        });
    });

}, 1500);


/*-------------------------------------------*/
/*------------ADD TO LIST MODAL--------------*/
/*-------------------------------------------*/
const lists = [];

//close modal
const closeModals = document.querySelectorAll(".close-add-modal");
closeModals.forEach((modal) => {
    modal.addEventListener("click", () => {
        addModal.classList.add("d-none");
    });
});

const usersListDiv = document.querySelector(".userLists");

async function genarateUserListsButtons(listName) {
    if (usersListDiv) {
        usersListDiv.innerHTML;
        const button = document.createElement("button");
        button.classList.add("list-item-btn");
        button.textContent = listName;
        usersListDiv.appendChild(button);
        const last_id = await getLastListId()
        console.log(last_id.list_id);
        button.dataset.listid = last_id.list_id;
        addBookToWishlistFromModal();
    }
}


function getLastListId() {
    return new Promise((resolve, reject) => {
        fetch("http://localhost/M_Bertrand-Back-end-/wishlists/getLastId")
            .then(res => res.json())
            .then(data => resolve(data))
            .catch(err => reject(err))
        ;
        
    })
;
}

const createNewListBtns = document.querySelectorAll(".create-new-list");

createNewListBtns.forEach(function (createBtn) {
    createBtn.addEventListener("click", function () {
        const newListName = prompt("Introduza o nome da nova lista");
        if (newListName === null) {
            return;
        }
        if (newListName != "") {
            fetch("http://localhost/M_Bertrand-Back-end-/wishlists/add", {
                headers: {
                    'Accept': 'text/html',
                    'Content-Type': 'text/html'
                },
                method: "POST",
                body: newListName
            }).then(genarateUserListsButtons(newListName));
        }
    
    });
});


/*------------------------------------------------------------*/
/*------------------------EDIT BOOK --------------------------*/
/*------------------------------------------------------------*/
const editBooks = document.querySelectorAll(".edit-book");
const closeEditBook = document.querySelector(".close-book-edit");
const editBookModal = document.querySelector(".edit-book-modal");
const editBookPencils = document.querySelectorAll(".edit-book-pencil");
const saveEdition = document.querySelector(".save-edit");

editBooks.forEach((editBook) => {
    editBook.addEventListener("click", () => {
        console.log("Edit book Clicked!");
        const bookId = editBook.dataset.book_id;
        fetch("http://localhost/M_Bertrand-Back-end-/books/"+bookId)
            .then(res => res.json())
            .then(data => {
                const title =  document.querySelector(".edit-book-modal .title");
                const author =  document.querySelector(".edit-book-modal .author");
                const price =  document.querySelector(".edit-book-modal .price");

                title.textContent = data.title;
                author.textContent = data.author;
                price.textContent = data.price;
                editBookModal.dataset.book_id = bookId;

            })
            .then(() => {
                editBookModal.classList.remove("hide");
            });
    });
});

closeEditBook.addEventListener("click", () => {
    console.log("works");
    editBookModal.classList.add("hide");
});

editBookPencils.forEach((edit) => {
    edit.addEventListener("click", (e) => {
        let fieldData = e.target.previousElementSibling.children[1].textContent;
        let fieldName = e.target.previousElementSibling.children[1];
        const bookId = editBookModal.dataset.book_id;
        let inputName;
        
        switch(fieldName.className) {
            case "title": inputName = "título"; break;
            case "author": inputName = "autor"; break;
            case "price": inputName = "preço"; break;
        }

        const newValue = prompt("Insira um novo " + inputName);
        
        fieldName.textContent = newValue;

    });
});


saveEdition.addEventListener("click", () => {

    const title = document.querySelector(".edit-book-modal .title").textContent;
    const author = document.querySelector(".edit-book-modal .author").textContent;
    const price = document.querySelector(".edit-book-modal .price").textContent;
    const bookId = editBookModal.dataset.book_id;

    const data = {
        book_id: bookId,
        title,
        author,
        price
    }

    fetch("/M_Bertrand-Back-end-/books/edit", {
        headers: {
            "Content-Type": "application/json"
        },
        method: "PUT",
        body: JSON.stringify(data)
    })
        .then(() => {
            editBookModal.classList.add("hide")
            window.location.reload();
            return false;
        });
});

  //Fazer um pedido de acesso aos livros Google Books API
  // Procurar por nome de livro -> https://www.googleapis.com/books/v1/volumes?q=search+terms

  //Procurar por categoria - > https://www.googleapis.com/books/v1/volumes?q=subject:fiction
