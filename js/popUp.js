var section = document.querySelector("section.contactSection");

// Select the elements within the section
// var contactButton = section.querySelector(".buttonComponent");
var contactButton = section.querySelector("#hireBtn");
var closeButtons = section.querySelectorAll("#close");
var textArea = section.querySelector("textarea");

contactButton.addEventListener("click", () => {
  section.classList.add("show");
  console.log("Contact button clicked!");
});

closeButtons.forEach((close) => {
  close.addEventListener("click", () => {
    section.classList.remove("show");
    textArea.value = "";
    console.log("Close button clicked!");
  });
});
