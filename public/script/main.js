document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelector('.slides');
    const slideCount = document.querySelectorAll('.slide').length;
    let index = 0;
    let sliderInterval;
    let isAnimating = false;

    function startSlider() {
        sliderInterval = setInterval(() => {
            index = (index + 1) % slideCount;
            updateSlider();
        }, 5000);
    }

    function resetSlider() {
        clearInterval(sliderInterval);
        startSlider();
    }

    function updateSlider() {
        slides.style.transform = `translateX(-${index * 100}%)`;
    }

    function handleNavigation(direction) {
        if (isAnimating) return;
        isAnimating = true;
        setTimeout(() => { isAnimating = false; }, 1000);

        if (direction === 'next') {
            index = (index + 1) % slideCount;
        } else {
            index = (index - 1 + slideCount) % slideCount;
        }
        updateSlider();
        resetSlider();
    }



    document.querySelector('.next').addEventListener('click', () => handleNavigation('next'));
    document.querySelector('.prev').addEventListener('click', () => handleNavigation('prev'));


    startSlider();

    const track = document.querySelector('.carousel-track');
    const prevButton = document.querySelector('.carousel-prev');
    const nextButton = document.querySelector('.carousel-next');
    const items = document.querySelectorAll('.carousel-item');
    const itemWidth = items[0].offsetWidth;
    let indexCarousel = 0;

    nextButton.addEventListener('click', () => {
        if (indexCarousel < items.length - 4) {
            indexCarousel++;
            track.style.transform = `translateX(-${indexCarousel * itemWidth}px)`;
        }
    });

    prevButton.addEventListener('click', () => {
        if (indexCarousel > 0) {
            indexCarousel--;
            track.style.transform = `translateX(-${indexCarousel * itemWidth}px)`;
        }
    });

});
