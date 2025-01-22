document.addEventListener('DOMContentLoaded', function() {
    // Initialize slider
    $('.slider').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: true
    });

    // Initialize carousel
    $('.carousel').slick({
        slidesToShow: 4, // Number of visible slides
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3, // 3 slides on medium screens
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2, // 2 slides on small screens
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1, // 1 slide on very small screens
                }
            }
        ]
    });
});
