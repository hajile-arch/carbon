function timelineCardsMouseOverAnimation(current_card, current_position) {
  current_card.style.transitionDuration = "0.5s";
  current_card.style.top = `${-2 + current_position}%`;
}

function timelineCardsMouseLeaveAnimation(current_card, current_position) {
  current_card.style.transitionDuration = "0.5s";
  current_card.style.top = `${current_position}%`;
}

function polaroidCardsMouseOverAnimation(current_card) {
  let img = current_card.querySelector("img");
  img.style.transitionDuration = "0.5s";
  img.style.height = "330px";
}

function polaroidCardsMouseLeaveAnimation(current_card) {
  let img = current_card.querySelector("img");
  img.style.transitionDuration = "0.5s";
  img.style.height = "300px";
}

function videoOnHoverAnimation(video) {
  video.className = video.className.replace("rounded", "rounded shadow-lg");
}

function videoOffHoverAnimation(video) {
  video.className = video.className.replace("shadow-lg", "");
}
