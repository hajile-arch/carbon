const registrationForm = document.getElementById("registrationForm");
const firstNameInput = document.getElementById("firstName");
const lastNameInput = document.getElementById("lastName");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const message = document.getElementById("message");

registrationForm.addEventListener("submit", function (e) {
  e.preventDefault(); //Prevent the form from submitting by default , because you need validate first

  const firstName = firstNameInput.value.trim();
  const lastName = lastNameInput.value.trim();
  const email = emailInput.value.trim();
  const password = passwordInput.value.trim();

  if (!firstName || !lastName || !email || !password) {
    message.textContent = "Please fill out all fields.";
    message.style.color = "red";
    message.style.display = "block";
  } else if (password.length < 8) {
    message.textContent = "Password has to be more than 8 characters.";
    message.style.color = "red";
    message.style.display = "block";
  } else {
    registrationForm.submit();
  }
});

emailInput.addEventListener("mouseover", function () {
  emailInput.style.backgroundColor = "red";
});

emailInput.addEventListener("mouseout", function () {
  emailInput.style.backgroundColor = "";
});
