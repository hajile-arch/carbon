function clearFeedback() {
  const feedback_subject = document.getElementById("feedback-subject");
  const feedback_message = document.getElementById("feedback-message");
  feedback_subject.value = "";
  feedback_message.value = "";
}

function showToast() {
  const toast = document.getElementById("toast");
  toast.classList.add("d-block");
}

function closeToast() {
  const toast = document.getElementById("toast");
  toast.classList.remove("d-block");
}

function feedbackValidation() {
  const feedback_subject = document.getElementById("feedback-subject");
  const feedback_message = document.getElementById("feedback-message");
  const toast_btn = document.getElementById("toast-btn");
  if (
    feedback_subject.value.trim() === "" ||
    feedback_message.value.trim() === ""
  ) {
    toast_btn.setAttribute("disabled", true);
  } else {
    toast_btn.removeAttribute("disabled");
  }
}
