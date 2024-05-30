document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.homepage-slider');
    const images = slider.querySelectorAll('img');

    const sliderNavLinks = document.querySelectorAll('.homepage-slider-nav a');

    let currentSlide = 0;

    function showSlide(slideIndex) {
        images.forEach((img, index) => {
            if (index === slideIndex) {
                img.classList.add('active');
            } else {
                img.classList.remove('active');
            }
        });
    }

    function setActiveNavLink(slideIndex) {
        sliderNavLinks.forEach((link, index) => {
            if (index === slideIndex) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }

    // Set the first slide as active
    showSlide(currentSlide);
    setActiveNavLink(currentSlide);

    document.querySelector('.homepage-control.prev').addEventListener('click', function() {
        currentSlide = (currentSlide - 1 + images.length) % images.length;
        showSlide(currentSlide);
        setActiveNavLink(currentSlide);
    });

    document.querySelector('.homepage-control.next').addEventListener('click', function() {
        currentSlide = (currentSlide + 1) % images.length;
        showSlide(currentSlide);
        setActiveNavLink(currentSlide);
    });

    sliderNavLinks.forEach((link, index) => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            currentSlide = index;
            showSlide(currentSlide);
            setActiveNavLink(currentSlide);
        });
    });
});



