const input = document.getElementById("searchForEvents");

function search(e) {
  e.preventDefault();

  const searchValue = input.value.toLowerCase().trim();
  const list_of_titles = document.querySelectorAll(".card-title");

  const filtered_list_of_titles = Array.from(list_of_titles)
    .map((title) => title.innerText.toLowerCase())
    .filter((title) => title.includes(searchValue));

  const list_of_events = document.querySelectorAll(".event-ctn");

  for (let i = 0; i < list_of_events.length; i++) {
    const event = list_of_events[i];
    const title = event.querySelector(".card-title").innerText.toLowerCase();

    if (filtered_list_of_titles.includes(title)) {
      event.classList.remove("d-none");
    } else {
      event.classList.add("d-none");
    }
  }
}

function setBtnState() {
  const btn = document.getElementById("find-btn");
  btn.disabled = input.value.trim() === "";
}
