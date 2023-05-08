const passwordField = document.querySelector(
  ".containerWrapper form .field input[type='password']"
);

const toggleIconBtn = document.querySelector(".containerWrapper form .field i");

toggleIconBtn.onclick = () => {
  if (passwordField.type == "password") {
    passwordField.type = "text";
    toggleIconBtn.classList.add("active");
  } else {
    passwordField.type = "password";
    toggleIconBtn.classList.remove("active");
  }
};
