console.log("Register page connected!");

/*---------------------------------------------------------------*/
/*--------------------------REGISTER AREA------------------------*/
/*---------------------------------------------------------------*/
const RegisterForm = document.getElementById("Form-register");
const avanceBtn = document.querySelector(".avanceBtn");
const infoIcon = document.querySelector(".info-icon");
const infoBox = document.querySelector(".info-box");
const registerSections = document.querySelector(".register-sections");
const registerSection_1 = document.querySelector(".register-step-1");
const registerSection_2 = document.querySelector(".register-step-2");

/*----------------------------------------------------------------*/
/*--------------------------User Data-----------------------------*/
let usersArr = [];
if(sessionStorage.getItem("users")) { 
  usersArr = JSON.parse(sessionStorage.getItem("users"));
}
let userEmail;
let cardCode;
let userName;
let userPassword;

/*----------------------------------------------------------------*/
/*------------------------------Invalid messages------------------*/
const emptyEmail = document.querySelector(".empty-email");
const invalidEmail = document.querySelector(".invalid-email");
const emptyName = document.querySelector(".empty-name");
const emptyPassword = document.querySelector(".empty-password");
const emptyPassword2 = document.querySelector(".empty-password-2");
const passwordDontMatch = document.querySelector(".password-dont-match");
const conditionsConfirm = document.querySelector(".termsAndConditions-conirm");
const existingEmail = document.querySelector(".existing-email");


const RegisterValidations = {

  //Register Section 1
  showEmptyEmailMessage: function () {
    emptyEmail.style.display = "block";
  },

  hideEmptyEmtyEmailMessage: function() {
    emptyEmail.style.display = "none";
  },

  showInvalidEmailMessage: function() {
    invalidEmail.style.display = "block";
  },

  hideInvalidEmailMessage: function() {
    invalidEmail.style.display = "none";
  },

  checkEmail: function (email) {
    const regex = /^(.{3,})@(.{3,})\.com$/;
    return regex.test(email);
  },
  
  //Register Section 2
  showEmptyNameMessage: function() {
    emptyName.style.display = "block";
  },

  hideEmptyNameMessage: function() {
    emptyName.style.display = "none";
  },

  showEmptyPasswordMessage: function() {
    emptyPassword.style.display = "block"
  },
  
  hideEmptyPasswordMessage: function() {
    emptyPassword.style.display = "none"
  },

  showEmptyPassword2Message: function() {
    emptyPassword2.style.display = "block"
  },
  
  hideEmptyPassword2Message: function() {
    emptyPassword2.style.display = "none"
  },

  showPasswordDontMatch: function() {
    passwordDontMatch.style.display = "block"
  },
  
  hidePasswordDontMatch: function() {
    passwordDontMatch.style.display = "none"
  },

  showConditionsConfirm: function (){
    conditionsConfirm.style.display= "block"; 
  },

  hideConditionsConfirm: function() {
    conditionsConfirm.style.display = "none";
  },

  showExistingEmail: function() {
    existingEmail.style.display = "block";
  },

  hideExistingEmail: function() {
    existingEmail.style.display = "none";
  }
}




infoIcon.addEventListener("mouseover", () => {
  console.log("work");
  document.querySelector(".info-box").style.display = "block";
});

infoBox.addEventListener("mouseleave", () => {
  document.querySelector(".info-box").style.display = "none";
});

//Event do hide empty email message when there is something in the input
RegisterForm.email.addEventListener("input", RegisterValidations.hideEmptyEmtyEmailMessage);

//Event do hide messages where the input is != "" || passwords match; 
RegisterForm.userName.addEventListener("input", RegisterValidations.hideEmptyNameMessage);
RegisterForm.password.addEventListener("input", function() {
  RegisterValidations.hideEmptyPasswordMessage();
  if(RegisterForm.password.value == RegisterForm.passwordConfirm.value) {
    RegisterValidations.hidePasswordDontMatch();
  }
});
RegisterForm.passwordConfirm.addEventListener("input", function() {
  RegisterValidations.hideEmptyPassword2Message;
  if(RegisterForm.password.value == RegisterForm.passwordConfirm.value) {
    RegisterValidations.hidePasswordDontMatch();
  }
});

if(RegisterForm.password.value == RegisterForm.passwordConfirm.value) {
  RegisterValidations.hidePasswordDontMatch();
}

//Event to hide conitionsConfirm Messsage when the input is checked
RegisterForm.termsAndConditions.addEventListener("click", function(e) {
  if(e.target.checked){
    RegisterValidations.hideConditionsConfirm()
  }
});

//Event to prvent user form submiting the form by hitting enter
RegisterForm.addEventListener("keypress", function(e) {
  if(e.keyCode == 13) {
    e.preventDefault();
    return false;
  }
})

//Event to check register_section1 validations and move to section_2
avanceBtn.addEventListener("click", () => {
  if(RegisterForm.email.value == "") {
    RegisterValidations.showEmptyEmailMessage();
  } 
  if (RegisterValidations.checkEmail(RegisterForm.email.value)) {
    if(!checkEmailRepetitions(RegisterForm.email.value)) {
      userEmail = RegisterForm.email.value;
      cardCode = RegisterForm.readerCardNumber.value;
      registerSection_1.style.display = "none";
      registerSection_2.style.display = "block";
      registerSections.querySelector("span").classList.remove("register-section-active");
      registerSections.querySelectorAll("span")[1].classList.add("register-section-active");
    } else {
      RegisterValidations.showExistingEmail();
      setTimeout(RegisterValidations.hideExistingEmail, 2500);
    }
      
  } else {
    if(emptyEmail.style.display != "block") {
      RegisterValidations.showInvalidEmailMessage();
      setTimeout(RegisterValidations.hideInvalidEmailMessage, 2500);
    }
  }
  //Event to check register_section2 validations and submit the final form
  RegisterForm.addEventListener("submit", function (e) {
    if (RegisterForm.userName.value != "" &&
      RegisterForm.password.value != "" && RegisterForm.passwordConfirm.value != "" &&
      RegisterForm.password.value == RegisterForm.passwordConfirm.value && RegisterForm.termsAndConditions.checked) {
      //Store user data in these variables to be added to the users array
      const username = RegisterForm.userName.value;
      const password = RegisterForm.password.value;
      const email = userEmail;
      console.log("Name: ", username);
      console.log("Password: ", password);
      console.log("Email: ", email);
      console.log("cardCode: ", cardCode);
    //   const user = {
    //     name: RegisterForm.userName.value,
    //     password: RegisterForm.password.value,
    //     email: userEmail,
    //     wishList: {
    //       wishListNames: [
    //         { 
    //           name: undefined,
    //           list: [],
    //           comments: []
    //         }
    //       ]
    //     },
    //     shoppcart: []
    //   }
      
      //Reset Form
      //RegisterForm.reset();
      //alert("Successful registered");
      //Hiding invalid messages
      RegisterValidations.hidePasswordDontMatch();
      return;
    } else if(RegisterForm.userName.value == ""){
      RegisterValidations.showEmptyNameMessage();
    } else if(RegisterForm.userName.value != "" && RegisterForm.password.value == "") {
      RegisterValidations.hideEmptyNameMessage();
      RegisterValidations.showEmptyPasswordMessage();
    } else if(RegisterForm.password.value != "" && RegisterForm.passwordConfirm.value == "") {
      RegisterValidations.hideEmptyPasswordMessage();
      RegisterValidations.showEmptyPassword2Message();
    } else if(RegisterForm.passwordConfirm.value != "" && RegisterForm.password.value != RegisterForm.passwordConfirm.value) {
      RegisterValidations.hideEmptyPassword2Message();
      RegisterValidations.showPasswordDontMatch();
    } else if(!RegisterForm.termsAndConditions.checked) {
      RegisterValidations.showConditionsConfirm();
    }
    e.preventDefault();
  });
});


function checkEmailRepetitions(email) {
  if(usersArr) {
    for(let i = 0; i < usersArr.length; i++) {
      if(email == usersArr[i].email) {
        return true;
      } 
    }
  }
}
