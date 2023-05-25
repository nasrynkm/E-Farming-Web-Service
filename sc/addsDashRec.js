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
        var section = document.querySelector(".addswidth");
        section.innerHTML = "";

        if (products.length > 0) {
          products.forEach(function (product) {
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
            align1.className = "align";
            align1.textContent = "Kgs";
            weightLimitFlex1.appendChild(align1);
            var dashLimit = document.createElement("div");
            dashLimit.className = "dashLimit";
            dashLimit.textContent = "-";
            var weightLimitFlex2 = document.createElement("div");
            weightLimitFlex2.className = "weightLimitFlex";
            weightLimitFlex2.textContent = product.Quantity;
            var align2 = document.createElement("div");
            align2.className = "align";
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
              var timeElement = document.createElement("div");
              timeElement.id = "time";
              timeElement.className = "align";

              // Parent Element 1: circle1
              var circle1 = document.createElement("div");
              circle1.className = "circle";
              circle1.style.setProperty("--clr", "#04fc43");

              // Child Element 1: svg1
              var svg1 = document.createElement("svg");

              // Child Element 1.1: circle1_1
              var circle1_1 = document.createElement("circle");
              circle1_1.setAttribute("cx", "20");
              circle1_1.setAttribute("cy", "20");
              circle1_1.setAttribute("r", "20");

              // Child Element 1.2: circle1_2
              var circle1_2 = document.createElement("circle");
              circle1_2.setAttribute("cx", "20");
              circle1_2.setAttribute("cy", "20");
              circle1_2.setAttribute("r", "20");
              circle1_2.id = "dd";

              // Child Element 1.3: divDays
              var divDays = document.createElement("div");
              divDays.id = "days";
              divDays.innerHTML = "00<br /><span>Day</span>";

              // Appending child elements to parent element 1
              svg1.appendChild(circle1_1);
              svg1.appendChild(circle1_2);
              circle1.appendChild(svg1);
              circle1.appendChild(divDays);

              // Parent Element 2: circle2
              var circle2 = document.createElement("div");
              circle2.className = "circle";
              circle2.style.setProperty("--clr", "red");

              // Child Element 2: svg2
              var svg2 = document.createElement("svg");

              // Child Element 2.1: circle2_1
              var circle2_1 = document.createElement("circle");
              circle2_1.setAttribute("cx", "20");
              circle2_1.setAttribute("cy", "20");
              circle2_1.setAttribute("r", "20");

              // Child Element 2.2: circle2_2
              var circle2_2 = document.createElement("circle");
              circle2_2.setAttribute("cx", "20");
              circle2_2.setAttribute("cy", "20");
              circle2_2.setAttribute("r", "20");
              circle2_2.id = "hh";

              // Child Element 2.3: divHours
              var divHours = document.createElement("div");
              divHours.id = "hours";
              divHours.innerHTML = "00<br /><span>Hrs</span>";

              // Appending child elements to parent element 2
              svg2.appendChild(circle2_1);
              svg2.appendChild(circle2_2);
              circle2.appendChild(svg2);
              circle2.appendChild(divHours);

              // Parent Element 3: circle3
              var circle3 = document.createElement("div");
              circle3.className = "circle";
              circle3.style.setProperty("--clr", "#fee800");

              // Child Element 3: svg3
              var svg3 = document.createElement("svg");

              // Child Element 3.1: circle3_1
              var circle3_1 = document.createElement("circle");
              circle3_1.setAttribute("cx", "20");
              circle3_1.setAttribute("cy", "20");
              circle3_1.setAttribute("r", "20");

              // Child Element 3.2: circle3_2
              var circle3_2 = document.createElement("circle");
              circle3_2.setAttribute("cx", "20");
              circle3_2.setAttribute("cy", "20");
              circle3_2.setAttribute("r", "20");
              circle3_2.id = "mm";

              // Child Element 3.3: divMinutes
              var divMinutes = document.createElement("div");
              divMinutes.id = "minutes";
              divMinutes.innerHTML = "00<br /><span>min</span>";

              // Appending child elements to parent element 3
              svg3.appendChild(circle3_1);
              svg3.appendChild(circle3_2);
              circle3.appendChild(svg3);
              circle3.appendChild(divMinutes);

              // Parent Element 4: circle4
              var circle4 = document.createElement("div");
              circle4.className = "circle";
              circle4.style.setProperty("--clr", "#3131f3");

              // Child Element 4: svg4
              var svg4 = document.createElement("svg");

              // Child Element 4.1: circle4_1
              var circle4_1 = document.createElement("circle");
              circle4_1.setAttribute("cx", "20");
              circle4_1.setAttribute("cy", "20");
              circle4_1.setAttribute("r", "20");

              // Child Element 4.2: circle4_2
              var circle4_2 = document.createElement("circle");
              circle4_2.setAttribute("cx", "20");
              circle4_2.setAttribute("cy", "20");
              circle4_2.setAttribute("r", "20");
              circle4_2.id = "ss";

              // Child Element 4.3: divSeconds
              var divSeconds = document.createElement("div");
              divSeconds.id = "seconds";
              divSeconds.innerHTML = "00<br /><span>sec</span>";

              // Appending child elements to parent element 4
              svg4.appendChild(circle4_1);
              svg4.appendChild(circle4_2);
              circle4.appendChild(svg4);
              circle4.appendChild(divSeconds);

              // Appending all parent elements to the time element
              timeElement.appendChild(circle1);
              timeElement.appendChild(circle2);
              timeElement.appendChild(circle3);
              timeElement.appendChild(circle4);

              //APPENDING TIME ELEMENT TO COMPONENTFLEX3
              componentFlex3.appendChild(timeElement);

              // ... continue ...

              let dd = circle1_2;
              let hh = circle2_2;
              let mm = circle3_2;
              let ss = circle4_2;

              // DATE FORMAT yyyy-mm-dd
              //              0   1  2
              let date = product.eventDate;
              let endDate = date;
              let parts = endDate.split(" ");
              let datePart = parts[0];
              let timePart = parts[1];

              if (endDate) {
                amountAvailable.style.display = "none";
                limitComponent.style.display = "none";
                timeElement.style.display = "flex";
              } else {
                amountAvailable.style.display = "flex";
                limitComponent.style.display = "flex";
                timeElement.style.display = "none";
              }

              // Convert the endDate format to "mm/dd/yyyy"
              let dateParts = datePart.split("-");
              let year = dateParts[0];
              let month = dateParts[1];
              let day = dateParts[2];

              let formattedEndDate = `${month}/${day}/${year} ${timePart}`;
              console.log(formattedEndDate);

              let x = setInterval(function () {
                let now = new Date(formattedEndDate).getTime();
                let countDown = new Date().getTime();
                let distance = now - countDown;

                // TIME CALCULATION FOR DAYS, HOURS, MINUTES, AND SECONDS
                let d = Math.floor(distance / (1000 * 60 * 60 * 24));
                let h = Math.floor(
                  (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                );
                let m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let s = Math.floor((distance % (1000 * 60)) / 1000);

                // Formatting the time values
                let formattedD = d.toString().padStart(2, "0"); // Add leading zero if necessary
                let formattedH = h.toString().padStart(2, "0"); // Add leading zero if necessary
                let formattedM = m.toString().padStart(2, "0"); // Add leading zero if necessary
                let formattedS = s.toString().padStart(2, "0"); // Add leading zero if necessary

                // GETTING THE OUTPUT TO DIV ID'S HTML
                divDays.innerHTML = formattedD + "<br /><span>Day</span>";
                divHours.innerHTML = formattedH + "<br /><span>Hrs</span>";
                divMinutes.innerHTML = formattedM + "<br /><span>min</span>";
                divSeconds.innerHTML = formattedS + "<br /><span>sec</span>";

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
                  return;
                }
              }, 1000);
            }

            innerAddsContainer.appendChild(componentFlex3);

            // EDIT AND DELETE PART
            var componentFlex4 = document.createElement("div");
            componentFlex4.className = "componentFlex4";
            var buttonContainer = document.createElement("div");
            buttonContainer.className = "buttonContainer";
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
