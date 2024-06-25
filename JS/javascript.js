const btn = document.getElementById("openmodal");
const container = document.getElementById("modal");
const btn2 = document.getElementById("closeModal");
const btn3 = document.getElementById("tuitionfee");
const container1 = document.getElementById("core");
const btn4 = document.getElementById("closebot");

container.style.display = "none";
container1.style.display = "none";

btn.addEventListener("click", () => {

  container.style.display = "block";
});

btn2.addEventListener("click", () => {
    container.style.display = "none";
    btn.style.display = "block";
});

btn3.addEventListener("click", () => {
    btn3.style.display = "none";
    container1.style.display = "block";
  });
  
  btn4.addEventListener("click", () => {
      container1.style.display = "none";
      btn3.style.display = "block";
  });
  

  document.addEventListener("DOMContentLoaded", function() {
    var profileButton = document.getElementById("profile-button");
    var dropdownContent = document.getElementById("dropdown-content");
  
    profileButton.addEventListener("click", function() {
      dropdownContent.classList.toggle("show");
    });
  
    window.addEventListener("click", function(event) {
      if (!event.target.matches("#profile-button")) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains("show")) {
            openDropdown.classList.remove("show");
          }
        }
      }
    });
  });
  
  