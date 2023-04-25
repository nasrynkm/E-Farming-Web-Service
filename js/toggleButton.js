// ASSIGNING ALL CLASSES OF TOGGLE BUTTON
const toggleButton = document.querySelector(".toggle-btn");
const toggledIcon = document.querySelector(".toggle-btn i");
const dropDownMenu = document.querySelector(".dropMenu");

toggleButton.onclick = function () {
  // SETTING TOGGLE OPENED CLASS
  dropDownMenu.classList.toggle("dropMenuOpened");

  // CALLING OPENED DROP DOWN MENU
  const dropMenuOpened = dropDownMenu.classList.contains("dropMenuOpened");

  if (dropMenuOpened) {
    toggledIcon.classList = "fa-solid fa-xmark";
  } else {
    toggledIcon.classList = "fa-solid fa-bars-staggered";
  }

  //  ANOTHER APROACH TO CHANGE toggledIcon
  /*
  toggledIcon.classList = dropMenuOpened
    ? "fa-solid fa-xmark"
    : "fa-solid fa-bars-staggered";
  */
};
