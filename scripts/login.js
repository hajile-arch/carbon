(() => {
  "use strict";

  const forms = document.querySelectorAll(".needs-validation");

  Array.from(forms).forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

function validateForm() {
  const password = document.getElementById("floatingPassword");
  const confirmPassword = document.getElementById("floatingConfirmPassword");
  const feedback = document.getElementById("floatingConfirmPasswordFeedback");

  if (confirmPassword.value.trim() === "") {
    feedback.innerText = "Please confirm your password";
    confirmPassword.setCustomValidity("Please confirm your password");
    confirmPassword.classList.add("is-invalid");
    confirmPassword.classList.remove("is-valid");
  } else {
    if (password.value !== confirmPassword.value) {
      feedback.innerText = "Password do not match";
      confirmPassword.setCustomValidity("Passwords do not match");
      confirmPassword.classList.add("is-invalid");
      confirmPassword.classList.remove("is-valid");
    } else {
      confirmPassword.setCustomValidity("");
      confirmPassword.classList.add("is-valid");
      confirmPassword.classList.remove("is-invalid");
    }
  }
}

function showPassword(btn) {
  const btn_icon = btn.querySelector("i");
  const input = btn.parentNode.querySelector("div input");
  if (btn_icon.className.includes("bi-eye-slash")) {
    btn_icon.className = btn_icon.className.replace("bi-eye-slash", "bi-eye");
    input.setAttribute("type", "text");
  } else {
    btn_icon.className = btn_icon.className.replace("bi-eye", "bi-eye-slash");
    input.setAttribute("type", "password");
  }
}
