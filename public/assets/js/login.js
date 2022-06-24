//select all input fields
const username = document.querySelector("#username");
const password = document.querySelector("#password");
const form = document.querySelector("#login_form");

// select all error messages
const username_error = document.querySelector("#username_error");
const password_error = document.querySelector("#password_error");

// select all icons
const username_icon = document.querySelector("#username_icon");
const password_icon = document.querySelector("#password_icon");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  //reset all error messasges on submit
  username_error.classList.add("hidden");
  password_error.classList.add("hidden");
  username.classList.remove("invalid_input");
  password.classList.remove("invalid_input");
  username_icon.classList.remove("invalid_input_icon");
  password_icon.classList.remove("invalid_input_icon");
  username_icon.classList.add("valid_input_icon");
  password_icon.classList.add("valid_input_icon");

  const username_val = document.querySelector("#username").value;
  const password_val = document.querySelector("#password").value;
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

  // password's length check
  if (!password_val) {
    password_error.innerText = "Please enter your password";
    password_error.classList.remove("hidden");
    errors_count++;
    password.classList.add("invalid_input");
    password_icon.classList.add("invalid_input_icon");
  } else if (password_val.length < 6) {
    password_error.innerText = "Password should be longer than 6 character";
    password_error.classList.remove("hidden");
    errors_count++;
    password.classList.add("invalid_input");
    password_icon.classList.add("invalid_input_icon");
  } else if (password_val.length > 20) {
    password_error.innerText = "Password should be less than 20 character";
    password_error.classList.remove("hidden");
    errors_count++;
    password.classList.add("invalid_input");
    password_icon.classList.add("invalid_input_icon");
  }

  // password's pattern test, throws error when user gives invalid password on password field
  const password_pattern = new RegExp(
    "(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})"
  );
  if (!password_pattern.test(password_val)) {
    password_error.innerText =
      "6 characters long and at least one uppercase, one loweracase, one number and one special character like $,@";
    password_error.classList.remove("hidden");
    errors_count++;
    password.classList.add("invalid_input");
    password_icon.classList.add("invalid_input_icon");
  }

  if (errors_count === 0) {
    form.submit();
  }
});
