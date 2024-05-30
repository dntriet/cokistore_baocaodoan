// back to top
window.addEventListener('scroll', function() {
  var scrollToTopButton = document.getElementById('scrollToTopButton');
  if (window.pageYOffset > 500) {
    scrollToTopButton.classList.add('show');
  } else {
    scrollToTopButton.classList.remove('show');
  }
});

document.getElementById('scrollToTopButton').addEventListener('click', function() {
  window.scrollTo({top: 0, behavior: 'smooth'});
});

// lấp lánh đê
 let index = 0;
        const interval = 1000;

        const rand = (min, max) => Math.floor(Math.random() * (max - min + 1)) + min;

        const animate = (star) => {
            star.style.setProperty("--star-left", `${rand(-10, 100)}%`);
            star.style.setProperty("--star-top", `${rand(-10, 80)}%`);
            star.style.animation = "none";
            star.offsetHeight;
            star.style.animation = "";
        };

        const animateStars = () => {
            const stars = document.getElementsByClassName("magic-star");
            for (const star of stars) {
                setTimeout(() => {
                    animate(star);
                    setInterval(() => animate(star), 1000);
                }, index++ * (interval / 3));
            }
        };

        animateStars();