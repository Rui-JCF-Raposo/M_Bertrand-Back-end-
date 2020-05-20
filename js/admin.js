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

formsArray.forEach((form) => {


    form.addEventListener("submit", (e) => {

        let $resourceName;

        switch(form.id) {
            case "add-book-form": resourceName = "adicionar o Livro"; break; 
            case "remove-book-form": resourceName = "remover o Livro"; break; 
            case "add-category-form": resourceName = "adicionar Categoria"; break; 
            case "remove-category-form": resourceName = "remover Categoria"; break; 
        }

        const affirmative = confirm("Têm a certeza que pretende " + resourceName);
        
        if(!affirmative) {
            e.preventDefault();
        }

    });
});