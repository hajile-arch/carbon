// let input = document.getElementById("searchForEvents");
// let list_of_events = document.getElementsByClassName("card-title");
// let container = document.getElementById("searchResultsContainer");

// function search(e) {
//     e.preventDefault();
//     container.innerHTML = ""; // Clear previous search results

//     let titles = [];
//     for (let i = 0; i < list_of_events.length; i++) {
//         let title = list_of_events[i].innerText;
//         if (!titles.includes(title)) {
//             titles.push(title);
//         }
//     }

//     if (input.value.trim() === "") {
//         // If input is empty, display all events
//         for (let i = 0; i < titles.length; i++) {
//             appendEventToList(titles[i]);
//         }
//         return;
//     }

//     let matchingTitles = titles.filter(title =>
//         title.toLowerCase().includes(input.value.toLowerCase())
//     );
    
//     if (matchingTitles.length > 0) {
//         matchingTitles.forEach(title => {
//             appendEventToList(title);
//         });
//     } else {
//         container.innerHTML = "No matching events found.";
//     }
// }

// function appendEventToList(title) {
//     let eventElement = document.createElement("div");
//     eventElement.textContent = title;
//     container.appendChild(eventElement);
// }
