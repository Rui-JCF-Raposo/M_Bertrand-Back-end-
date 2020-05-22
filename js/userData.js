console.log("User Data Script Connected!");

const editDivs = document.querySelectorAll(".edit-field");
const changePasswordForm = document.querySelector(".change-password-container form");


editDivs.forEach((edit) => {
    edit.addEventListener("click", (e) => {
        const oldValue = e.target.previousElementSibling.children[1];
        const fieldName = e.target.previousElementSibling.children[0].dataset.name;
        let promptPlaceholder;
        
        switch(fieldName) {
            case "name": promptPlaceholder = "nome"; break;
            case "email": promptPlaceholder = "email"; break;
            case "card_number": promptPlaceholder = "cartão bertrand"; break;
        }

        const newValue = prompt("Digite um novo " + promptPlaceholder );

        const data = {
            field_name: fieldName,
            new_value: newValue  
        }

        fetch(window.location.host + "/M_Bertrand-Back-end-/users", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        })
            .then(res => res.json())
            .then(data => {
                if(data.message === "Successfully Updated") {
                    oldValue.textContent = newValue;
                } else {
                    alert("Erro ao fazer alteração");
                }
            })
        ;


    });
});

const rep_password_message = document.querySelector(".password-error");

changePasswordForm.addEventListener("submit", (e) => {
    const current_password = document.getElementById("current-password").value;
    const new_password = document.getElementById("new-password").value;    
    const rep_new_password = document.getElementById("rep-new-password").value;
    
    if(
        current_password === "" ||
        new_password === "" ||
        rep_new_password === "" ||
        new_password !== rep_new_password
    ) {

        if(new_password !== rep_new_password) {
            rep_password_message.classList.remove("hide");
        }

        e.preventDefault();

    } 

});