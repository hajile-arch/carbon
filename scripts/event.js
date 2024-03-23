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

  if (searchValue  === "") {
    list_of_events.forEach(event => {
      event.classList.remove("d-none");
    });
  }
}

function handleFilter(btn) {
  const filteredCategory = btn.innerText.toLowerCase();
  const list_of_events = document.querySelectorAll(".event-ctn");

  for (let i = 0; i < list_of_events.length; i++) {
    const list_of_categories = list_of_events[i].querySelectorAll(".categories");
    let shouldHide = true;

    for (let j = 0; j < list_of_categories.length; j++) {
      const category = list_of_categories[j].innerText.toLowerCase();
      if (category.includes(filteredCategory)) {
        shouldHide = false;
      }
    }

    if (shouldHide) {
      list_of_events[i].classList.add("d-none");
    } else {
      list_of_events[i].classList.remove("d-none");
    }
  }
}




