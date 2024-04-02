function editProfile(btn) {
    const list_of_inputs = document.querySelectorAll("#user-data .form-control")
    for (let i = 0; i < list_of_inputs.length; i++) {
        list_of_inputs[i].removeAttribute("disabled");
        list_of_inputs[i].classList.add("border-dark-subtle");
        list_of_inputs[i].classList.remove("border-0");
    }

    btn.classList.replace("btn-dark", "btn-success");
    btn.innerText = "Save changes";
    setTimeout(() => {
        btn.setAttribute("type", "submit");
    }, 1);
}

// TODO: validate profile input
btn = document.getElementById("btn")
function validateName(name) {
    if (btn.type == "submit") {        
        const regex = /^[A-Za-z]+$/;
        if (!regex.test(name.value.trim())) {
            console.log('hit')
        }
    }

}
