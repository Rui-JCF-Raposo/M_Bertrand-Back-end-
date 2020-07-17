console.log("Admin JS Connected!");

const addBookForm = document.getElementById("add-book-form");;
const removeBookForm = document.getElementById("remove-book-form");
const addCategoryForm = document.getElementById("add-category-form");;
const removeCategoryForm = document.getElementById("remove-category-form");

const formsArray = [
    addBookForm,
    removeBookForm,
    addCategoryForm,
    removeCategoryForm
];

if(formsArray) {

    formsArray.forEach((form) => {


        if(!form) {
            return;
        }
        
        form.addEventListener("submit", (e) => {

            let $resourceName;

            switch(form.id) {
                case "add-book-form": resourceName = "adicionar o Livro"; break; 
                case "remove-book-form": resourceName = "remover o Livro"; break; 
                case "add-category-form": resourceName = "adicionar a Categoria"; break; 
                case "remove-category-form": resourceName = "remover a Categoria"; break; 
            }

            const affirmative = confirm("Têm a certeza que pretende " + resourceName);
            
            if(!affirmative) {
                e.preventDefault();
            }

        });
    });


}

const ordersDone = document.querySelectorAll(".order-done");

ordersDone.forEach((orderDone) => {
    orderDone.addEventListener("click", (e) => {
        const affirmative = confirm("Tem a certeza que pertende encerrar a encomenda?");
        if(!affirmative) {return false};
        const order_id = e.target.dataset.order_id;
        fetch("/M_Bertrand-Back-end-/orders/"+order_id+"/finalize")
    });
});

