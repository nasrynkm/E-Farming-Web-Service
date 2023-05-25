function fetchData(category) {
  var xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "http://localhost/E-Farming%20Dev/components/Farmer/fetch_data.php?category=" +
      category,
    true
  );

  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 400) {
      var data = JSON.parse(xhr.responseText);
      updateContent(data);
    } else {
      console.error("Request failed");
    }
  };

  xhr.send();
}

function updateContent(data) {
  var addswidth = document.querySelector(".addswidth");
  addswidth.innerHTML = ""; // Clear the existing content

  if (data.length === 0) {
    addswidth.innerHTML =
      '<h2 style="text-align: center; margin: 17% auto auto auto; color: white; width: 100%;">There are no adds to view in this Category yet!</h2>';
  } else {
    data.forEach(function (item) {
      var addContainer = document.createElement("div");
      addContainer.className = "addContainer";

      var innerAddsContainer = document.createElement("div");
      innerAddsContainer.className = "innerAddsContainer";

      // User profile portion
      var componentFlex1 = document.createElement("div");
      componentFlex1.className = "componentFlex1 addUserInner";

      var userProfileLink = document.createElement("a");
      userProfileLink.href = "#";

      var userProfileName = document.createElement("div");
      var names = document.createTextNode(item.firstName + " " + item.lastName);
      userProfileName.appendChild(names);
      userProfileLink.appendChild(userProfileName);
      componentFlex1.appendChild(userProfileLink);

      var addLocation = document.createElement("h5");
      addLocation.className = "addLocation";
      var location = document.createTextNode(item.Location);
      addLocation.appendChild(location);
      componentFlex1.appendChild(addLocation);

      innerAddsContainer.appendChild(componentFlex1);

      // Price portion
      var componentFlex2 = document.createElement("div");
      componentFlex2.className = "componentFlex2";

      var addPriceContainer = document.createElement("div");
      addPriceContainer.className = "addPriceContainer addPriceRowAlign";

      var addPrice = document.createElement("div");
      addPrice.className = "addPrice";
      var price = document.createTextNode(item.Price);
      addPrice.appendChild(price);
      addPriceContainer.appendChild(addPrice);

      var productWeight = document.createElement("div");
      productWeight.className = "productWeight";
      var weight = document.createTextNode("TZS");
      productWeight.appendChild(weight);
      addPriceContainer.appendChild(productWeight);

      componentFlex2.appendChild(addPriceContainer);
      innerAddsContainer.appendChild(componentFlex2);

      // Quantity Portion
      var componentFlex3 = document.createElement("div");
      componentFlex3.className = "componentFlex3";

      var amountAvailable = document.createElement("div");
      amountAvailable.className = "amountAvailable contHeaders";

      var quantityHeader = document.createElement("div");
      quantityHeader.className = "quantityHeader";
      var quantityHeaderText = document.createTextNode("Amount:");
      quantityHeader.appendChild(quantityHeaderText);
      amountAvailable.appendChild(quantityHeader);

      var quantity = document.createElement("div");
      var quantityText = document.createTextNode(item.Quantity + " KGS");
      quantity.appendChild(quantityText);
      amountAvailable.appendChild(quantity);

      componentFlex3.appendChild(amountAvailable);

      var limitComponent = document.createElement("div");
      limitComponent.className = "limitComponent contHeaders";

      var limitHeader = document.createElement("div");
      limitHeader.className = "quantityHeader";
      var limitHeaderText = document.createTextNode("Limit:");
      limitHeader.appendChild(limitHeaderText);
      limitComponent.appendChild(limitHeader);

      var limitWrap = document.createElement("div");
      limitWrap.className = "limitWrap";

      var weightLimitFlex1 = document.createElement("div");
      weightLimitFlex1.className = "weightLimitFlex";
      var startLimitText = document.createTextNode(item.StartLimit);
      var align1 = document.createElement("div");
      align1.className = "align";
      align1.textContent = "Kgs";
      weightLimitFlex1.appendChild(startLimitText);
      weightLimitFlex1.appendChild(align1);
      limitWrap.appendChild(weightLimitFlex1);

      var dashLimit = document.createElement("div");
      dashLimit.className = "dashLimit";
      var dashText = document.createTextNode("-");
      dashLimit.appendChild(dashText);
      limitWrap.appendChild(dashLimit);

      var weightLimitFlex2 = document.createElement("div");
      weightLimitFlex2.className = "weightLimitFlex";
      var quantityLimitText = document.createTextNode(item.Quantity);
      weightLimitFlex2.appendChild(quantityLimitText);
      var align2 = document.createElement("div");
      align2.className = "align";
      align2.textContent = "Kgs";
      weightLimitFlex2.appendChild(align2);
      limitWrap.appendChild(weightLimitFlex2);

      limitComponent.appendChild(limitWrap);
      componentFlex3.appendChild(limitComponent);

      innerAddsContainer.appendChild(componentFlex3);

      // Contact Portion
      var componentFlex4 = document.createElement("div");
      componentFlex4.className = "componentFlex4";

      var buttonContainer = document.createElement("div");
      buttonContainer.className = "buttonContainer";

      var trackButton = document.createElement("button");
      trackButton.type = "button";
      trackButton.className = "buttonComponent view";
      trackButton.textContent = "Track";
      buttonContainer.appendChild(trackButton);

      var contactButton = document.createElement("button");
      contactButton.type = "button";
      contactButton.className = "buttonComponent contact";
      contactButton.textContent = "Contact";
      buttonContainer.appendChild(contactButton);

      componentFlex4.appendChild(buttonContainer);
      innerAddsContainer.appendChild(componentFlex4);

      addContainer.appendChild(innerAddsContainer);
      addswidth.appendChild(addContainer);
    });
  }
}
