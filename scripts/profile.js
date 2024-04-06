const btn = document.getElementById("save-changes-btn");

function validateInput(input, regex) {
  if (btn.getAttribute("type") === "submit") {
    const isValid = regex.test(input.value.trim());
    input.classList.toggle("is-invalid", !isValid);
    setBtnState();
  }
}

function setBtnState() {
  const inputs = document.querySelectorAll("#user-data .form-control");
  let all_valid = true;
  for (i = 0; i < inputs.length; i++) {
    if (inputs[i].className.includes("is-invalid")) {
      all_valid = false;
      break;
    }
  }
  btn.disabled = !all_valid;
}

function editProfile() {
  const list_of_inputs = document.querySelectorAll("#user-data .form-control");
  for (let i = 0; i < list_of_inputs.length; i++) {
    if (list_of_inputs[i].getAttribute("type") != "email") {
      list_of_inputs[i].removeAttribute("disabled");
      list_of_inputs[i].classList.add("border-dark-subtle");
      list_of_inputs[i].className = list_of_inputs[i].className.replace(
        "border-0",
        "border-2"
      );
    }
  }

  btn.classList.replace("btn-dark", "btn-success");
  btn.innerText = "Save changes";
  setTimeout(() => {
    btn.setAttribute("type", "submit");
  }, 1);
}

let click = 0
function saveChanges() {
  click++
  if (click == 2) {
    const email = document.getElementById("email")
    email.removeAttribute("disabled")
  }
}
