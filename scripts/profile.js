function editProfile(btn) {
    const list_of_inputs = document.querySelectorAll("#user-data .form-control")
    for (let i = 0; i < list_of_inputs.length; i++) {
        list_of_inputs[i].removeAttribute("disabled")
        list_of_inputs[i].classList.add("shadow")

        btn.className = btn.className.replace("btn-dark", "btn-success")
        btn.innerText = "Save changes"
        setTimeout(() => {
            btn.setAttribute("type", "submit")
        }, 1);
    }
}


