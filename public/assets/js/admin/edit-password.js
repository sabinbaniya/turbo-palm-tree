const cpass = document.getElementById("cpass");
const npass = document.getElementById("npass");
const repass = document.getElementById("repass");
const new_pass_error = document.getElementById("new_pass_error");
const re_pass_error = document.getElementById("re_pass_error");
const submitBtn = document.getElementById("btn");

cpass.addEventListener("input", handleChange);
npass.addEventListener("input", handleChange);
repass.addEventListener("input", handleChange);
submitBtn.addEventListener("click", handleChange);

function handleChange(ev) {
  switch (ev.srcElement.getAttribute("id")) {
    case "cpass":
      break;
    case "npass":
      checkPasswordStrength(npass.value, new_pass_error);
      break;
    case "repass":
      checkPasswordStrength(repass.value, re_pass_error);
      break;
  }
  if (npass.value && repass.value) {
    if (npass.value !== repass.value) {
      re_pass_error.innerText = "Passwords don't match!";
      re_pass_error.classList.remove("hidden");
    }
    if (cpass.value) {
      activateBtn();
    }
  }
}

function activateBtn() {
  submitBtn.disabled = false;
  submitBtn.classList.remove("bg-blue-300");
  submitBtn.classList.remove("cursor-not-allowed");
  submitBtn.classList.add("bg-blue-500");
  submitBtn.classList.add("cursor-pointer");
}

function checkPasswordStrength(password_val, password_error) {
  let errors = 0;
  // password's length check
  if (!password_val) {
    password_error.innerText = "Please enter your password";
    password_error.classList.remove("hidden");
    errors++;
  } else if (password_val.length < 6) {
    password_error.innerText = "Password should be longer than 6 character";
    password_error.classList.remove("hidden");
    errors++;
  } else if (password_val.length > 20) {
    password_error.innerText = "Password should be less than 20 character";
    password_error.classList.remove("hidden");
    errors++;
  }

  // password's pattern test, throws error when user gives invalid password on password field
  const password_pattern = new RegExp(
    "(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,})"
  );
  if (!password_pattern.test(password_val)) {
    password_error.innerText =
      "6 characters long and at least one uppercase, one lowercase, one number and one special character like $,@";
    password_error.classList.remove("hidden");
    errors++;
  }

  if (errors === 0) {
    password_error.innerText = "";
    password_error.classList.add("hidden");
  }
}
