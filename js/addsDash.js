// Function to fetch and display products based on category and userRef
function fetchProducts(category, userRef) {
  var xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "http://localhost/E-Farming%20Dev/components/Farmer/fetch_data.php?category=" +
      category +
      (userRef ? "&userRef=" + userRef : ""),
    true
  );

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var products = JSON.parse(xhr.responseText);
        console.log(products);

        var section = document.querySelector(".addswidth");
        section.innerHTML = "";

        if (products.length > 0) {
          products.forEach(function (product) {
            console.log(product);

            var addContainer = document.createElement("div");
            addContainer.className = "addContainer";
            var innerAddsContainer = document.createElement("div");
            innerAddsContainer.className = "innerAddsContainer";

            // USER NAMES AND LOCATION PART
            var componentFlex1 = document.createElement("div");
            componentFlex1.className = "componentFlex1 addUserInner";
            var userLink = document.createElement("a");
            userLink.href = "#";
            userLink.textContent = product.firstName + " " + product.lastName;
            var addLocation = document.createElement("h5");
            addLocation.className = "addLocation";
            addLocation.textContent = product.Location;
            componentFlex1.appendChild(userLink);
            componentFlex1.appendChild(addLocation);
            innerAddsContainer.appendChild(componentFlex1);

            // PRICE PART
            var componentFlex2 = document.createElement("div");
            componentFlex2.className = "componentFlex2";
            var addPriceContainer = document.createElement("div");
            addPriceContainer.className = "addPriceContainer addPriceRowAlign";
            var addPrice = document.createElement("div");
            addPrice.className = "addPrice";
            addPrice.textContent = product.Price;
            var productWeight = document.createElement("div");
            productWeight.className = "productWeight";
            productWeight.textContent = "TZS";
            addPriceContainer.appendChild(addPrice);
            addPriceContainer.appendChild(productWeight);
            componentFlex2.appendChild(addPriceContainer);
            innerAddsContainer.appendChild(componentFlex2);

            // QUANTITY AND LIMIT PART
            var componentFlex3 = document.createElement("div");
            componentFlex3.className = "componentFlex3";
            var amountAvailable = document.createElement("div");
            amountAvailable.className = "amountAvailable contHeaders";
            var quantityHeader = document.createElement("div");
            quantityHeader.className = "quantityHeader";
            quantityHeader.textContent = "Amount:";
            var quantity = document.createElement("div");
            quantity.textContent = product.Quantity + " KGS";
            amountAvailable.appendChild(quantityHeader);
            amountAvailable.appendChild(quantity);

            var limitComponent = document.createElement("div");
            limitComponent.className = "limitComponent contHeaders";
            var quantityHeader2 = document.createElement("div");
            quantityHeader2.className = "quantityHeader";
            quantityHeader2.textContent = "Limit:";
            var limitWrap = document.createElement("div");
            limitWrap.className = "limitWrap";
            var weightLimitFlex1 = document.createElement("div");
            weightLimitFlex1.className = "weightLimitFlex";
            weightLimitFlex1.textContent = product.StartLimit;
            var align1 = document.createElement("div");
            align1.className = "alignKgs";
            align1.textContent = "Kgs";
            weightLimitFlex1.appendChild(align1);
            var dashLimit = document.createElement("div");
            dashLimit.className = "dashLimit";
            dashLimit.textContent = "-";
            var weightLimitFlex2 = document.createElement("div");
            weightLimitFlex2.className = "weightLimitFlex";
            weightLimitFlex2.textContent = product.Quantity;
            var align2 = document.createElement("div");
            align2.className = "alignKgs";
            align2.textContent = "Kgs";
            weightLimitFlex2.appendChild(align2);
            limitWrap.appendChild(weightLimitFlex1);
            limitWrap.appendChild(dashLimit);
            limitWrap.appendChild(weightLimitFlex2);
            limitComponent.appendChild(quantityHeader2);
            limitComponent.appendChild(limitWrap);

            componentFlex3.appendChild(amountAvailable);
            componentFlex3.appendChild(limitComponent);

            // Create the time element if a product has got a date in it
            if (product.eventDate) {
              // Adding the time component
              var timeElement = document.createElement("div");
              timeElement.id = "time";
              timeElement.className = "align";

              timeElement.innerHTML = `
                                        <div class="circle" style="--clr: #04fc43">
                                          <svg>
                                            <circle cx="20" cy="20" r="20"></circle>
                                            <circle cx="20" cy="20" r="20" id="dd"></circle>
                                          </svg>
                                          <div id="days">00<br /><span>Day</span></div>
                                        </div>

                                        <div class="circle" style="--clr: red">
                                          <svg>
                                            <circle cx="20" cy="20" r="20"></circle>
                                            <circle cx="20" cy="20" r="20" id="hh"></circle>
                                          </svg>
                                          <div id="hours">00<br /><span>Hrs</span></div>
                                        </div>

                                        <div class="circle" style="--clr: #fee800">
                                          <svg>
                                            <circle cx="20" cy="20" r="20"></circle>
                                            <circle cx="20" cy="20" r="20" id="mm"></circle>
                                          </svg>
                                          <div id="minutes">00<br /><span>min</span></div>
                                        </div>

                                        <div class="circle" style="--clr: #7cd1f9">
                                          <svg>
                                            <circle cx="20" cy="20" r="20"></circle>
                                            <circle cx="20" cy="20" r="20" id="ss"></circle>
                                          </svg>
                                          <div id="seconds">00<br /><span>sec</span></div>
                                        </div>
                                      `;

              // ... continue ...

              // DATE FORMAT yyyy-mm-dd
              //              0   1  2
              let date = product.eventDate;
              let endDate = date;

              let parts = endDate.split(" ");
              let datePart = parts[0];
              let timePart = parts[1];

              // Convert the endDate format to "mm/dd/yyyy"
              let dateParts = datePart.split("-");
              let year = dateParts[0];
              let month = dateParts[1];
              let day = dateParts[2];

              let formattedEndDate = `${month}/${day}/${year} ${timePart}`;
              console.log(formattedEndDate);

              let x;

              if (
                formattedEndDate !== "00/00/0000 00:00:00" &&
                formattedEndDate !== null
              ) {
                // Add timeElement as a child of componentFlex3
                componentFlex3.appendChild(timeElement);

                amountAvailable.style.display = "none";
                limitComponent.style.display = "none";
                timeElement.style.display = "flex";

                x = setInterval(function () {
                  let now = new Date(formattedEndDate).getTime();
                  let countDown = new Date().getTime();
                  let distance = now - countDown;

                  // TIME CALCULATION FOR DAYS, HOURS, MINUTES, AND SECONDS
                  let d = Math.floor(distance / (1000 * 60 * 60 * 24));
                  let h = Math.floor(
                    (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                  );
                  let m = Math.floor(
                    (distance % (1000 * 60 * 60)) / (1000 * 60)
                  );
                  let s = Math.floor((distance % (1000 * 60)) / 1000);

                  // Formatting the time values
                  let formattedD = d.toString().padStart(2, "0"); // Add leading zero if necessary
                  let formattedH = h.toString().padStart(2, "0"); // Add leading zero if necessary
                  let formattedM = m.toString().padStart(2, "0"); // Add leading zero if necessary
                  let formattedS = s.toString().padStart(2, "0"); // Add leading zero if necessary

                  let days = document.getElementById("days");
                  let hours = document.getElementById("hours");
                  let minutes = document.getElementById("minutes");
                  let seconds = document.getElementById("seconds");

                  // GETTING THE OUTPUT TO DIV ID'S HTML
                  days.innerHTML = formattedD + "<br /><span>Day</span>";
                  hours.innerHTML = formattedH + "<br /><span>Hrs</span>";
                  minutes.innerHTML = formattedM + "<br /><span>min</span>";
                  seconds.innerHTML = formattedS + "<br /><span>sec</span>";

                  let dd = document.getElementById("dd");
                  let hh = document.getElementById("hh");
                  let mm = document.getElementById("mm");
                  let ss = document.getElementById("ss");

                  //   ANIMATING DOT'S STROKE IN STYLE
                  dd.style.strokeDashoffset = 440 - (440 * formattedD) / 365; //365 days in a year
                  hh.style.strokeDashoffset = 440 - (440 * formattedH) / 24; //24 hours in a day
                  mm.style.strokeDashoffset = 440 - (440 * formattedM) / 60; //60 minutes in an hour
                  ss.style.strokeDashoffset = 440 - (440 * formattedS) / 60; //60 seconds in a minute

                  // Check if the distance is less than or equal to 0, indicating that the time is over
                  if (distance <= 0) {
                    // Display the contents of amountAvailable and limitComponent
                    amountAvailable.style.display = "flex";
                    limitComponent.style.display = "flex";
                    timeElement.style.display = "none";

                    // Clear the interval to stop the countdown
                    clearInterval(x);

                    // Set the product.eventDate of that product to NULL in MySQL product table
                    var updateRequest = new XMLHttpRequest();
                    updateRequest.open(
                      "POST",
                      "http://localhost/E-Farming%20Dev/components/Farmer/dateUpdateEvent.php",
                      true
                    );

                    // SETTING  header name AND  header value
                    updateRequest.setRequestHeader(
                      "Content-type",
                      "application/x-www-form-urlencoded"
                    );

                    //CHECKING IF  (readyState = 4) and the server response of 200 (indicating a successful operation).
                    updateRequest.onreadystatechange = function () {
                      if (
                        updateRequest.readyState === 4 &&
                        updateRequest.status === 200
                      ) {
                        console.log("Product eventDate updated successfully!");
                      }
                    };

                    //ASSIGNING THE VALUES TO BE PASSED IN THE REQEST LINK
                    var productId = product.ID;
                    var eventDate = null;

                    //ASSIGNING NEW VAR THATHOLDS ENCODED VALUES TO BE PASSED
                    var requestBody =
                      "productId=" +
                      encodeURIComponent(productId) +
                      "&eventDate=" +
                      encodeURIComponent(eventDate);

                    //PASSING THE REQUEST BODY AND SENDING
                    updateRequest.send(requestBody);

                    return;
                  }
                }, 1000);
              } else {
                amountAvailable.style.display = "flex";
                limitComponent.style.display = "flex";
                timeElement.style.display = "none";
              }
            }

            innerAddsContainer.appendChild(componentFlex3);

            // EDIT AND DELETE PART OR Contact Portion
            var componentFlex4 = document.createElement("div");
            componentFlex4.className = "componentFlex4";

            var buttonContainer = document.createElement("div");
            buttonContainer.className = "buttonContainer";

            console.log(product.account);
            console.log(product.uniqueID);

            var editButton = document.createElement("button");
            editButton.type = "button";
            editButton.className = "buttonComponent view";
            var editLink = document.createElement("a");
            editLink.href = "updateProduct.php?edit=" + product.ID;
            editLink.textContent = "Edit";
            editButton.appendChild(editLink);

            var deleteButton = document.createElement("button");
            deleteButton.type = "button";
            deleteButton.className = "buttonComponent contact";
            var deleteLink = document.createElement("a");
            deleteLink.href = "farmerDash.php?delete=" + product.ID;
            deleteLink.textContent = "Delete";
            deleteButton.appendChild(deleteLink);

            buttonContainer.appendChild(editButton);
            buttonContainer.appendChild(deleteButton);

            componentFlex4.appendChild(buttonContainer);
            innerAddsContainer.appendChild(componentFlex4);

            addContainer.appendChild(innerAddsContainer);
            section.appendChild(addContainer);
          });
        } else {
          var noAddsMessage = document.createElement("h2");
          noAddsMessage.style.textAlign = "center";
          noAddsMessage.style.margin = "17% auto auto auto";
          noAddsMessage.style.color = "white";
          noAddsMessage.style.width = "100%";
          noAddsMessage.textContent = "No adds in this Category yet!";
          section.appendChild(noAddsMessage);
        }
      } else {
        console.log("Request failed. Error: " + xhr.status);
      }
    }
  };
  xhr.send();
}

// Usage example:
// fetchProducts("Carrots", '<?php echo $_SESSION["uniqueID"]; ?>');
