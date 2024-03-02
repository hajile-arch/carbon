function handleButtonClick(button, slideClassName) {
  const slide = document.querySelector(slideClassName);
  const progress_bar = document.getElementById("progress-bar");

  switch (true) {
    case slide.className.includes("slide-1"):
      prev_button.setAttribute("disabled", true);
      progress_bar.style.width = "0%";
      console.log("slide-1");
      break;
    case slide.className.includes("slide-2"):
      prev_button.removeAttribute("disabled");
      progress_bar.style.width = "12.5%";
      console.log("slide-2");
      break;
    case slide.className.includes("slide-3"):
      progress_bar.style.width = "25%";
      console.log("slide-3");
      break;
    case slide.className.includes("slide-4"):
      progress_bar.style.width = "37.5%";
      console.log("slide-4");
      break;
    case slide.className.includes("slide-5"):
      progress_bar.style.width = "50%";
      console.log("slide-5");
      break;
    case slide.className.includes("slide-6"):
      progress_bar.style.width = "62.5%";
      console.log("slide-6");
      break;
    case slide.className.includes("slide-7"):
      progress_bar.style.width = "75%";
      console.log("slide-7");
      break;
    case slide.className.includes("slide-8"):
      next_button.removeAttribute("disabled");
      progress_bar.style.width = "87.5%";
      console.log("slide-8");
      break;
    case slide.className.includes("slide-x"):
      next_button.setAttribute("disabled", true);
      progress_bar.style.width = "100%";
      console.log("slide-x");
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
