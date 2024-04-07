var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("delete");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// Get the "No" button in the modal
var cancelButton = document.getElementsByClassName("cancel-btn")[0];

// When the user clicks the button, open the modal
btn.addEventListener("click", function (event) {
  event.preventDefault(); // Prevent default form submission behavior
  modal.style.display = "block";
});

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
};

// When the user clicks on "No" button, close the modal
cancelButton.onclick = function () {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
