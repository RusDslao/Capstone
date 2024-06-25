// JavaScript for highlighting active navigation item when scrolling past sections

window.addEventListener('scroll', function() {
    let header = document.querySelector('.header');
    let windowPosition = window.scrollY > 0;
    header.classList.toggle('scrolling-active', windowPosition);
});

const sections = document.querySelectorAll('section[id]');

function highlightCurrentSection() {
    let scrollPosition = window.scrollY;

    sections.forEach(current => {
        const sectionTop = current.offsetTop - 50;
        const sectionHeight = current.offsetHeight;
        const sectionId = current.getAttribute('id');

        if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
            const navLinks = document.querySelectorAll('.navigate a');

            navLinks.forEach(link => {
                link.classList.remove('active');
            });

            document.querySelector(`.navigate a[href="#${sectionId}"]`).classList.add('active');
        }
    });
}

window.addEventListener('scroll', highlightCurrentSection);
