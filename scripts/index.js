new fullpage("#fullpage", {
  autoScrolling: true,
  scrollHorizontally: true,
  onLeave: function (origin) {
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
