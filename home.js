function handleButtonClick(button, slideClassName) {
  const slide = document.querySelector(slideClassName);
  const progress_bar = document.getElementById("progress-bar");

  switch (true) {
    case slide.className.includes("slide-1"):
      prev_button.setAttribute("disabled", true);
      progress_bar.style.width = "0%";
      progress_bar.console.log("slide-1");
      break;
    case slide.className.includes("slide-2"):
      prev_button.removeAttribute("disabled");
      progress_bar.style.width = "25%";
      console.log("slide-2");
      break;
    case slide.className.includes("slide-3"):
      next_button.removeAttribute("disabled");
      progress_bar.style.width = "50%";
      console.log("slide-3");
      break;
    case slide.className.includes("slide-4"):
      next_button.setAttribute("disabled", true);
      progress_bar.style.width = "75%";
      console.log("slide-4");
      break;
    default:
      break;
  }
}

const prev_button = document.getElementById("prev-btn");
const next_button = document.getElementById("next-btn");

prev_button.addEventListener("click", () => {
  handleButtonClick(prev_button, ".carousel-item-prev");
});

next_button.addEventListener("click", () => {
  handleButtonClick(next_button, ".carousel-item-next");
});
