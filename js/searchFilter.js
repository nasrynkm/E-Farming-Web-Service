// Get the submit button element
const submitButton = document.querySelector(".submit-button");

// Add event listener to the submit button
submitButton.addEventListener("click", function (event) {
  event.preventDefault(); // Prevent form submission

  // Get the search input element
  const searchInput = document.getElementById("search-input");

  // Get the selected sort order from the price filter
  const priceFilter = document.getElementById("price-filter");
  const sortOrder = priceFilter.value;

  // Get the keyword
  const keyword = searchInput.value;

  // Print the keyword and sort order to the console
  console.log("Keyword: " + keyword);
  console.log("Sort Order: " + sortOrder);

  // Perform further actions or submit the form
  // ...
});
