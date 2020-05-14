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
/*--------FUNCTION TO GET BOOKS FROM GOOGLE BOOKS API------------*/
/*---------------------------------------------------------------*/
// function getBooks(url, quantity, htmlOutput) {
//   fetch(url)
//     .then(response => response.json())
//     .then(function (data) {
//       //Loop to import books to homepage "Novidades" section
//       let bookOutput = "";
//       console.log("data -> ", data)
//       for (var i = 0; i < quantity; i++) {
//         bookOutput += `
//           <div class="book-box" data-id="${data.items[i].id}">
//             <div class="book-img-wrapper">
//               <img class="book-image" src="${data.items[i].volumeInfo.imageLinks.thumbnail}">
//               <div class="add-to-shoppcart">CESTO</div>
//               <div class="add-to-list">LISTA</div>
//               <div class="book-price">${(Math.random() * 30).toFixed(2) + " €"}</div>
//             </div>
//             <div class="product-info">
//               <h2 class="book-title">${data.items[i].volumeInfo.title}</h2>
//               <p class="book-authors">escrito por: <strong>${data.items[i].volumeInfo.authors[0]}</strong></p>
//             </div>
//           </div>
//         `;
//         let book = { 
//           title: data.items[i].volumeInfo.title, 
//           authors: data.items[i].volumeInfo.authors, 
//           cover: data.items[i].volumeInfo.imageLinks.thumbnail, 
//           id: data.items[i].id,
//         }

//         if(!checkRepetitionsInDB(book)) {
//           booksDataBase.push(book); 
//         }
//       }
//       htmlOutput.innerHTML = bookOutput;

//       sessionStorage.setItem("books", JSON.stringify(booksDataBase));
//     });
// }

// function checkRepetitionsInDB (book) {
//   for(let i = 0; i < booksDataBase.length; i++) {
//     if(booksDataBase[i].id == book.id) {
//       return true;
//     }
//   }
// }
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

// if(!newBooksDiv || !preReleasesDiv) {
//   clientLoggedIn = true;
// } else {
//   clientLoggedIn = false;
// }

// if(!clientLoggedIn) {
//   getBooks("https://www.googleapis.com/books/v1/volumes?q=subject:fiction&key=" + googleBooksApiKey, 8, newBooksDiv);
// }

// if(spanishBooksDiv !=  null) {
//   getBooks("https://www.googleapis.com/books/v1/volumes?q=subject:arte&key=" + googleBooksApiKey, 8, spanishBooksDiv);
// }

// if(englishBooksDiv != null) {
//   getBooks("https://www.googleapis.com/books/v1/volumes?q=subject:literature&key=" + googleBooksApiKey, 8, englishBooksDiv);
// }

// if(frenchBooksDiv != null) {
//   getBooks("https://www.googleapis.com/books/v1/volumes?q=subject:france&key=" + googleBooksApiKey, 8, frenchBooksDiv);
// }

// if(ebooksDiv != null) {
//   getBooks("https://www.googleapis.com/books/v1/volumes?q=subject:terror&key=" + googleBooksApiKey, 8, ebooksDiv);
// }

// if(textBooksDiv !=  null) {
//   getBooks("https://www.googleapis.com/books/v1/volumes?q=subject:textbooks&key=" + googleBooksApiKey, 8, textBooksDiv);
// }



//

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

function genarateUserListsButtons(listName) {
    if (usersListDiv) {
        usersListDiv.innerHTML;
        const button = document.createElement("button");
        button.classList.add("list-item-btn");
        button.textContent = listName;
        usersListDiv.appendChild(button);
    }
}

const createNewListBtns = document.querySelectorAll(".create-new-list");

createNewListBtns.forEach(function (createBtn) {
    createBtn.addEventListener("click", function () {
        const newListName = prompt("Introduza o nome da nova lista");
        if (newListName === null) {
            return;
        }
        if (newListName != "") {
            genarateUserListsButtons(newListName);
            fetch("../controllers/wishlists.php?wishlist=add&name=" + newListName)
        }
    });
});


// function makeBooksStorage() {
//   getBooks("https://www.googleapis.com/books/v1/volumes?q=subject:fiction&key=" + googleBooksApiKey, 8, "");
//   getBooks("https://www.googleapis.com/books/v1/volumes?q=subject:arte&key=" + googleBooksApiKey, 8, "");
//   getBooks("https://www.googleapis.com/books/v1/volumes?q=subject:literature&key=" + googleBooksApiKey, 8, "");
//   getBooks("https://www.googleapis.com/books/v1/volumes?q=subject:france&key=" + googleBooksApiKey, 8, "");
//   getBooks("https://www.googleapis.com/books/v1/volumes?q=subject:terror&key=" + googleBooksApiKey, 8, "");
//   getBooks("https://www.googleapis.com/books/v1/volumes?q=subject:textbooks&key=" + googleBooksApiKey, 8, "");
// }
// makeBooksStorage();

  //Fazer um pedido de acesso aos livros Google Books API
  // Procurar por nome de livro -> https://www.googleapis.com/books/v1/volumes?q=search+terms

  //Procurar por categoria - > https://www.googleapis.com/books/v1/volumes?q=subject:fiction
