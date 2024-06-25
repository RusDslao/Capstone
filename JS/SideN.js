
const email = "@gmail.com"

function loadContent(url) {
    const mainContent = document.getElementById("main-content"); // Assuming you have an element with this id for content
  
    fetch(url)
      .then(response => response.text()) // Get the HTML content as text
      .then(data => {
        mainContent.innerHTML = data; // Replace the content of the main-content element
      })
      .catch(error => console.error(error)); // Handle errors during content loading
  }

  const navLinks = document.querySelectorAll(".TextIcon");

navLinks.forEach(link => {
  link.addEventListener("click", function() {
    // Check if the link has an href attribute (internal link)
    if (this.getAttribute("href") !== "") {
      // Prevent default link behavior (unless you want the link to open in a new tab)
      event.preventDefault();

      // Get the URL from the href attribute (assuming your links point to internal HTML sections)
      const url = this.getAttribute("href");

      // Call the loadContent function to replace the main content
      loadContent(url);
    }
  });
});
