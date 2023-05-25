container = document.querySelector(".cropJs").querySelectorAll("h2");
console.log(container);

container.forEach((element) => {
  element.addEventListener("click", function () {
    container.forEach((h2) => h2.classList.remove("activeCrop"));

    this.classList.add("activeCrop");
  });
});
