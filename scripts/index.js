// new fullpage("#fullpage", {
//   autoScrolling: true,
//   scrollHorizontally: true,
//   onLeave: function (origin) {
//     if (origin.index === 1 || origin.index === 3) {
//       let title = document.getElementById("upcoming-events-title");
//       let cards = document.getElementById("cards");
//       title.style.marginTop = "0px";
//       cards.style.marginTop = "0px";
//     } else {
//       let title = document.getElementById("upcoming-events-title");
//       let cards = document.getElementById("cards");
//       title.style.marginTop = "200px";
//       cards.style.marginTop = "300px";
//     }
//   },
// });

document.addEventListener("scroll", () => {
  // let section_2_img = document.getElementById("section-2-img")
  // let section_2_header = document.getElementById("section-2-header")
  // let section_2_paragraph = document.getElementById("section-2-paragraph")
  if (window.scrollY >= 300) {
    // section_2_img.style.marginTop = "0px"
    // section_2_header.style.opacity = 1
    // section_2_paragraph.style.opacity = 1

    // let title = document.getElementById("upcoming-events-title");
    // let cards = document.getElementById("cards");
    // title.style.marginTop = "0px";
    // cards.style.marginTop = "0px";
  } else {
    // section_2_img.style.marginTop = "500px"
    // section_2_header.style.opacity = 0
    // section_2_paragraph.style.opacity = 0

    // let title = document.getElementById("upcoming-events-title");
    // let cards = document.getElementById("cards");
    // title.style.marginTop = "200px";
    // cards.style.marginTop = "300px";
  }
});
