new fullpage("#fullpage", {
  autoScrolling: true,
  scrollHorizontally: true,
  onLeave: function (origin, destination, direction) {
    if (origin.index === 0 || origin.index === 2) {
      let image = document.getElementById("section-2-img");
      let container = document.getElementById("how-it-works-container");
      let paragraph = document.getElementById("how-it-works-paragraph");
      image.style.left = "70px";
      container.style.width = "55%";
      paragraph.style.marginLeft = "0px";
    } else {
      let image = document.getElementById("section-2-img");
      let container = document.getElementById("how-it-works-container");
      let paragraph = document.getElementById("how-it-works-paragraph");
      image.style.left = "0px";
      container.style.width = "75%";
      paragraph.style.marginLeft = "150px";
    }
    if (origin.index === 1 || origin.index === 3) {
      let title = document.getElementById("upcoming-events-title");
      let cards = document.getElementById("cards");
      title.style.marginTop = "0px";
      cards.style.marginTop = "0px";
    } else {
      let title = document.getElementById("upcoming-events-title");
      let cards = document.getElementById("cards");
      title.style.marginTop = "200px";
      cards.style.marginTop = "300px";
    }
  },
});
