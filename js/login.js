console.log("Login JS Connected!");

const FormLogin = document.getElementById("Form-login");
const usersArr = JSON.parse(sessionStorage.getItem("users"));
const invalidData = document.querySelector(".invalid-data");


FormLogin.addEventListener("submit", function(e) {
  let chosenEmail = FormLogin.userEmail.value;
  let chosenPassword = FormLogin.password.value;
  validadeUserData(chosenEmail, chosenPassword, e);
});


function validadeUserData(chosenEmail, chosenPassword, e) {
  // Fazer conexão à base de dados de modo a autenticar
  if(usersArr) {
    //
  } else {
    alert("Não existem utilizadores");
    e.preventDefault();
  }
}