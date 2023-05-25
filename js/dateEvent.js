let days = document.getElementById("days");
let hours = document.getElementById("hours");
let minutes = document.getElementById("minutes");
let seconds = document.getElementById("seconds");

let dd = document.getElementById("dd");
let hh = document.getElementById("hh");
let mm = document.getElementById("mm");
let ss = document.getElementById("ss");

// let day_dot = document.querySelector(".day_dot");
// let hour_dot = document.querySelector(".hour_dot");
// let min_dot = document.querySelector(".min_dot");
// let sec_dot = document.querySelector(".sec_dot");

/// DATE FORMAT dd/mm/yyyy
let endDate = "26/05/2023 15:48:00";

let amountAvailable = document.querySelector(".amountAvailable");
let limitComponent = document.querySelector(".limitComponent");
let align = document.getElementById("time");

if (endDate) {
  amountAvailable.style.display = "none";
  limitComponent.style.display = "none";
  align.style.display = "flex";
} else {
  amountAvailable.style.display = "flex";
  limitComponent.style.display = "flex";
  align.style.display = "none";
}
amountAvailable;
limitComponent;
// Convert the endDate format to "mm/dd/yyyy"
let endDateParts = endDate.split("/");
let formattedEndDate = `${endDateParts[1]}/${endDateParts[0]}/${endDateParts[2]}`;

let x = setInterval(function () {
  let now = new Date(formattedEndDate).getTime();
  let countDown = new Date().getTime();
  let distance = now - countDown;

  // TIME CALCULATION FOR DAYS, HOURS, MINUTES, AND SECONDS
  let d = Math.floor(distance / (1000 * 60 * 60 * 24));
  let h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  let m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  let s = Math.floor((distance % (1000 * 60)) / 1000);

  // Formatting the time values
  let formattedD = d.toString().padStart(2, "0"); // Add leading zero if necessary
  let formattedH = h.toString().padStart(2, "0"); // Add leading zero if necessary
  let formattedM = m.toString().padStart(2, "0"); // Add leading zero if necessary
  let formattedS = s.toString().padStart(2, "0"); // Add leading zero if necessary

  // GETTING THE OUTPUT TO DIV ID'S HTML
  days.innerHTML = formattedD + "<br /><span>Day</span>";
  hours.innerHTML = formattedH + "<br /><span>Hrs</span>";
  minutes.innerHTML = formattedM + "<br /><span>min</span>";
  seconds.innerHTML = formattedS + "<br /><span>sec</span>";

  //   ANIMATING DOT'S STROKE IN STYLE
  dd.style.strokeDashoffset = 440 - (440 * formattedD) / 365; //365 days in a year
  hh.style.strokeDashoffset = 440 - (440 * formattedH) / 24; //24 hours in a day
  mm.style.strokeDashoffset = 440 - (440 * formattedM) / 60; //60 minutes in an hour
  ss.style.strokeDashoffset = 440 - (440 * formattedS) / 60; //60 seconds in a minute

  // //   ANIMATING CIRCLE DOTS
  // day_dot.style.transform = `rotateZ(${formattedD * 0.986}deg)`; //360 degrees / 365 days = 0.986
  // hour_dot.style.transform = `rotateZ(${formattedH * 15}deg)`; //360 degrees / 24 hours = 15
  // min_dot.style.transform = `rotateZ(${formattedM * 6}deg)`; //360 degrees / 60 minutes = 6
  // sec_dot.style.transform = `rotateZ(${formattedS * 6}deg)`; //360 degrees / 60 seconds = 6

  // Check if the distance is less than or equal to 0, indicating that the time is over
  if (distance <= 0) {
    // Display the contents of amountAvailable and limitComponent
    amountAvailable.style.display = "contents";
    limitComponent.style.display = "contents";
    align.style.display = "none";

    // Clear the interval to stop the countdown
    clearInterval(x);
    return;
  }
}, 1000);
