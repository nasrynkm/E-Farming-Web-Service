const contactSection = document.querySelector("contactSection"),
  contact = contactSection.querySelector("buttonComponent"),
  closeBtn = contactSection.querySelectorAll("#close"),
  textArea = contactSection.querySelector("textarea");

contact.addEventListener("click", () => {
  contactSection.classList.add("show");
});

closeBtn.forEach((cBtn) => {
  cBtn.addEventListener("click", () => {
    contactSection.classList.remove("show");
    textArea.value = "";
  });
});
