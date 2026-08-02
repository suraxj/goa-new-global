(function () {
  "use strict";

  dragula([
    document.querySelector("#leads-discovered"),
    document.querySelector("#leads-qualified"),
    document.querySelector("#contact-initiated"),
    document.querySelector("#needs-identified"),
    document.querySelector("#negotiation"),
    document.querySelector("#deal-finalized"),
  ]);

  /* TargetDate Picker */
  flatpickr("#targetDate", {
    enableTime: true,
    minTime: "16:00",
    maxTime: "22:00",
    disableMobile: true
  });

/* Image upload */
let loadFile = function (event) {
  var reader = new FileReader();
  
  reader.onload = function () {
    var output = document.getElementById("profile-img");
    if (event.target.files && event.target.files[0]) {
      if (event.target.files[0].type.match("image.*")) {
        output.src = reader.result;
      } else {
        event.target.value = "";
        alert("Please select a valid image file.");
      }
    } else {
      // Handle case where no file is selected (user clicked cancel)
      event.target.value = "";
      console.log("No file selected.");
    }
  };
  
  if (event.target.files && event.target.files[0]) {
    reader.readAsDataURL(event.target.files[0]);
  }
};

// Select the input element and attach the event listener
let ProfileChange = document.querySelector("#profile-change");
ProfileChange.addEventListener("change", loadFile);
  
})();
