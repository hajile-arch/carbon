function handleOnUpdate(btn) {
    const email = document.getElementById("email")
    email.removeAttribute("disabled")
}

(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
  
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        } else {
            handleOnUpdate(document.getElementById('update'))
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()

