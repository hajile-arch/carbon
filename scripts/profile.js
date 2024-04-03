function editProfile(btn) {
    const list_of_inputs = document.querySelectorAll("#user-data .form-control")
    for (let i = 0; i < list_of_inputs.length; i++) {
        if (list_of_inputs[i].getAttribute("type") != "email") {
            list_of_inputs[i].removeAttribute("disabled");
            list_of_inputs[i].classList.add("border-dark-subtle");
            list_of_inputs[i].classList.remove("border-0");
        }
    }

    btn.classList.replace("btn-dark", "btn-success");
    btn.innerText = "Save changes";
    setTimeout(() => {
        btn.setAttribute("type", "submit");
    }, 1);
}

function validateName(name) {
    const btn = document.getElementById("save-changes-btn");
    if (btn.getAttribute("type") == "submit") {        
        const regex = /^[A-Za-z\s]+$/;
        if (!regex.test(name.value.trim())) {
            btn.setAttribute("disabled", "true");
            name.classList.add("is-invalid");
        } else {
            btn.removeAttribute("disabled");
            name.classList.remove("is-invalid");
        }
    }
}