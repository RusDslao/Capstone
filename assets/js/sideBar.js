document.addEventListener("DOMContentLoaded", function() {
    const menuLinks = document.querySelectorAll('.nav-link');

    menuLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior

            // Remove 'active' class from all links
            menuLinks.forEach(link => link.classList.remove('active'));

            // Add 'active' class to the clicked link
            this.classList.add('active');

            // Handle navigation to sections
            const targetSectionId = this.querySelector('a').getAttribute('href').substring(1); // Get the ID of the target section
            const targetSection = document.getElementById(targetSectionId); // Find the target section element

            // Check if the target section exists
            if (targetSection) {
                // Display the target section and hide others
                document.querySelectorAll('section').forEach(section => {
                    section.style.display = 'none';
                });
                targetSection.style.display = 'block';
            } else {
                console.error(`Section with ID '${targetSectionId}' not found.`);
            }
        });
    });

    const toggleButton = document.querySelector('.toggle');
    const sidebar = document.querySelector('.sidebar');

    toggleButton.addEventListener('click', function () {
        sidebar.classList.toggle('close');
    });

    const modeToggle = document.querySelector('.mode');

    modeToggle.addEventListener('click', function () {
        document.body.classList.toggle('dark');
    });

    // Load initial content based on URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    const initialPage = urlParams.get('page') || 'dashboard';
    const initialSection = document.getElementById(initialPage);
    if (initialSection) {
        document.querySelectorAll('section').forEach(section => {
            section.style.display = 'none';
        });
        initialSection.style.display = 'block';
    } else {
        console.error(`Section with ID '${initialPage}' not found.`);
    }
});
