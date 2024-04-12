(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }
        form.classList.add('was-validated')
        }, false)
    })
})()

function phoneNumberValidation() {
    const phoneNumber = document.getElementById("phone")
    const phoneNumberRegexPattern = /^[\d\s-]+$/

    if (!phoneNumberRegexPattern.test(phoneNumber.value)) { 
        phoneNumber.setCustomValidity("Invalid phone number")
    } else {
        phoneNumber.setCustomValidity("")
    }
}

function categoriesValidation() {
    const categories = document.getElementById("categories")
    const categoriesRegexPattern = /^([A-Za-z]+)\s*,\s*([A-Za-z]+)$/

    if (!categoriesRegexPattern.test(categories.value)) { 
        categories.setCustomValidity("Invalid categories")
    } else {
        categories.setCustomValidity("")
    }
}


