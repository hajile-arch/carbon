

let prev_btn_state = "disabled";
let next_btn_state = "disabled";
let current_slide = 1;

function setBtnAttribute() {
  let prev_btn = document.getElementById("prev-btn");
  let next_btn = document.getElementById("next-btn");
  if (prev_btn_state == "disabled") {
    prev_btn.setAttribute("disabled", "true");
  } else {
    prev_btn.removeAttribute("disabled");
  }
  if (next_btn_state == "disabled") {
    next_btn.setAttribute("disabled", "true");
  } else {
    next_btn.removeAttribute("disabled");
  }
}
function setBtnState(input) {
  let slide = document.querySelector(".carousel-item.active");
  if (input.value == null || input.value.trim() === "") {
    slide.setAttribute("data-next-btn-state", "disabled");
  } else {
    slide.setAttribute("data-next-btn-state", "enabled");
  }
  getBtnState(".carousel-item.active");
}

function setProgress(slide) {
  let progress_bar = document.getElementById("progress-bar");
  if (slide) {
    switch (true) {
      case slide.className.includes("slide-1"):
        current_slide = 1;
        progress_bar.style.width = "0%";
        break;
      case slide.className.includes("slide-2"):
        current_slide = 2;
        progress_bar.style.width = "14.3%";
        break;
      case slide.className.includes("slide-3"):
        current_slide = 3;
        progress_bar.style.width = "28.6%";
        break;
      case slide.className.includes("slide-4"):
        current_slide = 4;
        progress_bar.style.width = "42.9%";
        break;
      case slide.className.includes("slide-5"):
        current_slide = 5;
        progress_bar.style.width = "57.1%";
        break;
      case slide.className.includes("slide-6"):
        current_slide = 6;
        progress_bar.style.width = "71.4%";
        break;
      case slide.className.includes("slide-7"):
        current_slide = 7;
        progress_bar.style.width = "85.7%";
        break;
      case slide.className.includes("slide-8"):
        current_slide = 8;
        progress_bar.style.width = "100%";
        break;
    }
  }
}

function getBtnState(active) {
  let slide = document.querySelector(active);
  if (slide) {
    prev_btn_state = slide.getAttribute("data-prev-btn-state");
    next_btn_state = slide.getAttribute("data-next-btn-state");
    console.log(prev_btn_state, next_btn_state);
    setBtnAttribute();
    setProgress(slide);
  }
}

document.addEventListener("keydown", (event) => {
  if (event.key === "ArrowLeft") {
    getBtnState(".carousel-item-prev");
    setBtnState();
  } else if (event.key === "ArrowRight") {
    getBtnState(".carousel-item-next");
  }
});

function autoFocusCurrentInput() {
  setTimeout(() => {
    const current_input = document.querySelector(".active input");
    if (current_input.getAttribute("type") == "number") {
      current_input.focus();
    }
  }, 700);
}

function handleSubmitBtnStyling() {
  let submit_btn = document.getElementById("submit-btn");
  if (current_slide == 8) {
    submit_btn.innerText = "Submit";
    submit_btn.className = submit_btn.className.replace(
      "text-black",
      "btn-success text-white"
    );
  } else {
    submit_btn.innerText = "Next";
    submit_btn.className = submit_btn.className.replace(
      "btn-success text-white",
      "text-black"
    );
  }
}

function handleSubmitBtn() {
  const submit_btn = document.getElementById("submit-btn");
  if (
    document
    .querySelector(".carousel-item.active")
    .className.includes("slide-8")
  ) {
    const form = document.getElementById("carousel");
    form.submit();
  }
}

function inputValidation(input) {
  const validRegex = /^[0-9+\-*/e\s]+$/;
  if (!validRegex.test(input.value)) {
    input.value = input.value.replace(/[^0-9+\-*/e\s]/g, "");
  }
}

function totalMileageValidation(input) {
  if (input.value > 999999) {
    input.value = input.value.slice(0, 6);
  }
}

function totalYearValidation(input) {
  if (input.value > 100) {
    input.value = input.value.slice(0, -1);
  }
}

function yearlyMileageValidation() {
  const totalMileage = document.getElementById("totalMileage");
  const totalYear = document.getElementById("totalYear");
  const slide = document.querySelector(".carousel-item.active");
  if (
    totalMileage.value > 0 &&
    (totalYear.value == 0 || totalYear.value == null)
  ) {
    totalYear.className = totalYear.className.replace(
      "form-control",
      "form-control is-invalid"
    );
    slide.setAttribute("data-next-btn-state", "disabled");
  } else {
    totalYear.className = totalYear.className.replace("is-invalid", "");
    slide.setAttribute("data-next-btn-state", "enabled");
  }
}

function validationForEmptyField() {
  const current_input = document.querySelector(".active input");
  if (current_input.getAttribute("type") == "number") {
    console.log(current_input);
    if (current_input.value == null || input.value == "") {
      current_input.className = current_input.className.replace(
        "form-control",
        "form-control is-invalid"
      );
    } else {
      current_input.className = current_input.className.replace(
        "is-invalid",
        ""
      );
    }
  }
}

$(document).ready(function() {
  $.ajax({
    url: '../api/home-pull.php',
    type: 'GET',
    success: function(data) {
      console.log("Data: ", data)
      if (data == "false") {
        // If user has already entered data, disable form
        const slide_0 = document.querySelector(".slide-0")
        slide_0.classList.add("active")
        const slide_1 = document.querySelector(".slide-1")
        slide_1.classList.remove("active")
        const prev_btn = document.getElementById("prev-btn")
        prev_btn.classList.add("d-none")
        const next_btn = document.getElementById("next-btn")
        next_btn.classList.add("d-none")
      }
    },
    error: function(e) {
      console.error(e);
    }
  });
});