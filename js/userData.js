console.log("User Data Script Connected!");

const editDivs = document.querySelectorAll(".edit-field");
const changePasswordForm = document.querySelector(".change-password-container form");


editDivs.forEach((edit) => {
    edit.addEventListener("click", (e) => {
        const oldValue = e.target.previousElementSibling.children[1];
        const fiedlName = e.target.previousElementSibling.children[0].textContent;
        const newValue = prompt("Digite um novo " + fiedlName);
        oldValue.textContent = newValue;

    });
});

changePasswordForm.addEventListener("submit", (e) => {
    
    
    e.preventDefault();
});