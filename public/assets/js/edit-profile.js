document.addEventListener("DOMContentLoaded", () => {
  //select all input fields
  const name = document.querySelector("#name");
  const username = document.querySelector("#username");
  const email = document.querySelector("#email");
  const number = document.querySelector("#number");
  const birthdate = document.querySelector("#birth-date");
  const gender = document.querySelector("#gender");
  const form = document.querySelector("#update_form");
  const btn = document.querySelector("#btn");

  // select all error messages
  const name_error = document.querySelector("#name_error");
  const username_error = document.querySelector("#username_error");
  const email_error = document.querySelector("#email_error");
  const number_error = document.querySelector("#number_error");
  const birthdate_error = document.querySelector("#birth-date_error");

  // select all icons
  const name_icon = document.querySelector("#name_icon");
  const username_icon = document.querySelector("#username_icon");
  const email_icon = document.querySelector("#email_icon");
  const number_icon = document.querySelector("#number_icon");
  const birthdate_icon = document.querySelector("#birth-date_icon");

  name.addEventListener("input", checkInput);
  username.addEventListener("input", checkInput);
  email.addEventListener("input", checkInput);
  number.addEventListener("input", checkInput);
  birthdate.addEventListener("input", checkInput);
  gender.addEventListener("input", checkInput);

  // set date's select fields to be atleast 8 years back from todays date
  const todaysDate = new Date().toLocaleDateString();
  const year = parseInt(todaysDate.split("/")[2]) - 8;
  const month =
    todaysDate.split("/")[0].length === 1
      ? "0" + todaysDate.split("/")[0]
      : todaysDate.split("/")[0];
  const day =
    todaysDate.split("/")[1].length === 1
      ? "0" + todaysDate.split("/")[1]
      : todaysDate.split("/")[1];
  const allowedDate = [year, month, day].join("-");

  birthdate.max = allowedDate;

  function checkName() {
    name_error.classList.add("hidden");
    name.classList.remove("invalid_input");
    name_icon.classList.remove("invalid_input_icon");
    name_icon.classList.add("valid_input_icon");
    const name_val = name.value;
    let errors_count = 0;

    // name's length check
    if (!name_val) {
      name_error.innerText = "Please enter your name";
      name_error.classList.remove("hidden");
      name.classList.add("invalid_input");
      name_icon.classList.add("invalid_input_icon");
      errors_count++;
    } else if (name_val.length > 20) {
      name_error.innerText = "Name cannot be longer than 20 characters";
      name_error.classList.remove("hidden");
      name.classList.add("invalid_input");
      name_icon.classList.add("invalid_input_icon");
      errors_count++;
    }

    // name's pattern test, throws error when user gives, special chars or numbers on name field
    const name_pattern = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~|0-9]/;
    if (name_pattern.test(name_val)) {
      name_error.innerText = "Please enter your real name";
      name_error.classList.remove("hidden");
      name.classList.add("invalid_input");
      name_icon.classList.add("invalid_input_icon");
      errors_count++;
    }

    if (errors_count !== 0) {
      return false;
    }
    return true;
  }

  function checkEmail() {
    email_error.classList.add("hidden");
    email.classList.remove("invalid_input");
    email_icon.classList.remove("invalid_input_icon");
    email_icon.classList.add("valid_input_icon");
    const email_val = email.value;
    let errors_count = 0;

    // email's length check
    if (!email_val) {
      email_error.innerText = "Please enter your email";
      email_error.classList.remove("hidden");
      errors_count++;
      email.classList.add("invalid_input");
      email_icon.classList.add("invalid_input_icon");
    } else if (email_val.length > 30) {
      email_error.innerText = "email cannot be longer than 30 characters";
      email_error.classList.remove("hidden");
      errors_count++;
      email.classList.add("invalid_input");
      email_icon.classList.add("invalid_input_icon");
    }

    // email's pattern test, throws error when user gives invalid email on email field
    const email_pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!email_pattern.test(email_val)) {
      email_error.innerText = "Please provide a valid email";
      errors_count++;
      email_error.classList.remove("hidden");
      email.classList.add("invalid_input");
      email_icon.classList.add("invalid_input_icon");
    }

    if (errors_count !== 0) {
      return false;
    } else {
      return true;
    }
  }

  function checkUsername() {
    username_error.classList.add("hidden");
    username.classList.remove("invalid_input");
    username_icon.classList.remove("invalid_input_icon");
    username_icon.classList.add("valid_input_icon");
    const username_val = username.value;
    let errors_count = 0;

    // username's length check
    if (!username_val) {
      username_error.innerText = "Please enter your username";
      username_error.classList.remove("hidden");
      errors_count++;
      username.classList.add("invalid_input");
      username_icon.classList.add("invalid_input_icon");
    } else if (username_val.length > 20) {
      username_error.innerText = "Username cannot be longer than 20 characters";
      username_error.classList.remove("hidden");
      errors_count++;
      username.classList.add("invalid_input");
      username_icon.classList.add("invalid_input_icon");
    }

    // username's pattern test, throws error when user gives, special chars on username field
    const username_pattern = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    if (username_pattern.test(username_val)) {
      username_error.innerText = "Username can only contain numbers & letters";
      username_error.classList.remove("hidden");
      errors_count++;
      username.classList.add("invalid_input");
      username_icon.classList.add("invalid_input_icon");
    }

    if (errors_count !== 0) {
      return false;
    } else {
      return true;
    }
  }

  function checkNumber() {
    number_error.classList.add("hidden");
    number.classList.remove("invalid_input");
    number_icon.classList.remove("invalid_input_icon");
    number_icon.classList.add("valid_input_icon");
    const number_val = number.value;
    let errors_count = 0;

    // number's length check
    if (!number_val) {
      number_error.innerText = "Please enter your number";
      number_error.classList.remove("hidden");
      errors_count++;
      number.classList.add("invalid_input");
      number_icon.classList.add("invalid_input_icon");
    } else if (number_val.length !== 10) {
      number_error.innerText = "Number should be 10 characters long";
      number_error.classList.remove("hidden");
      errors_count++;
      number.classList.add("invalid_input");
      number_icon.classList.add("invalid_input_icon");
    }

    // number's pattern test, throws error when user gives invalid number on number field
    const number_pattern = /[0-9]/;
    if (!number_pattern.test(number_val)) {
      number_error.innerText = "Please provide a valid number";
      number_error.classList.remove("hidden");
      errors_count++;
      number.classList.add("invalid_input");
      number_icon.classList.add("invalid_input_icon");
    }

    if (errors_count !== 0) {
      return false;
    } else {
      return true;
    }
  }

  function checkBirthDate() {
    birthdate_error.classList.add("hidden");
    birthdate.classList.remove("invalid_input");
    birthdate_icon.classList.remove("invalid_input_icon");
    birthdate_icon.classList.add("valid_input_icon");
    const birthdate_val = birth - date.value;
    let errors_count = 0;

    // birthdate's length check
    if (!birthdate_val) {
      birthdate_error.innerText = "Please select your birthdate";
      birthdate_error.classList.remove("hidden");
      errors_count++;
      birthdate.classList.add("invalid_input");
      birthdate_icon.classList.add("invalid_input_icon");
    }
  }

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    deactivate_button();
    form.submit();
  });

  function checkInput(e) {
    let isNameValid,
      isEmailValid,
      isNumberValid,
      isUsernameValid,
      isBirthdateValid;
    switch (e.target.getAttribute("id")) {
      case "name":
        isNameValid = checkName();
        break;
      case "email":
        isEmailValid = checkEmail();
        break;
      case "number":
        isNumberValid = checkNumber();
        break;
      case "username":
        isUsernameValid = checkUsername();
        break;
      case "birthdate":
        isBirthdateValid = checkBirthDate();
        break;
    }

    if (
      !isNameValid ||
      !isEmailValid ||
      !isNumberValid ||
      !isUsernameValid ||
      !isBirthdateValid
    ) {
      activate_button();
    }
  }

  function activate_button() {
    btn.disabled = false;
    btn.classList.remove("cursor-not-allowed");
    btn.classList.remove("bg-blue-300");
    btn.classList.add("bg-blue-500");
    btn.classList.add("hover:bg-blue-400");
    btn.classList.add("cursor-pointer");
  }

  function deactivate_button() {
    btn.disabled = true;
    btn.classList.add("cursor-not-allowed");
    btn.classList.add("bg-blue-300");
    btn.classList.remove("bg-blue-500");
    btn.classList.remove("hover:bg-blue-400");
    btn.classList.remove("cursor-pointer");
  }
});
