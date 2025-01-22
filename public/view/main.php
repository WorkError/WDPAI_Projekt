<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page - Forum</title>
    <link rel="stylesheet" href="css/main.css">
    <!-- External libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
    <!-- Navigation Bar -->
    <header>
        <nav class="navbar">
            <div class="logo"><a href="main">WeWatch</a></div>
            <ul class="menu">
                <li><a href="profile"><i class="ri-user-line"></i></a></li>
                <li><a href="logout">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Slider Section -->
    <section class="slider">
        <div><img src="assets/slider_1.jpg" alt="Movie 1"></div>
        <div><img src="assets/slider_2.jpg" alt="Movie 2"></div>
        <div><img src="assets/slider_3.jpg" alt="Movie 3"></div>
    </section>

    <div class="main_content">
        <section class="recommended">
            <h2>Recommended Movies</h2>
            <div class="carousel">
                <div><img src="assets/carousel_1.webp" alt="Movie 1"></div>
                <div><img src="assets/carousel_2.webp" alt="Movie 2"></div>
                <div><img src="assets/carousel_3.webp" alt="Movie 3"></div>
                <div><img src="assets/carousel_4.webp" alt="Movie 4"></div>
                <div><img src="assets/carousel_5.webp" alt="Movie 5"></div>
                <div><img src="assets/carousel_6.webp" alt="Movie 6"></div>
                <div><img src="assets/carousel_7.webp" alt="Movie 7"></div>
                <div><img src="assets/carousel_8.webp" alt="Movie 8"></div>
                <div><img src="assets/carousel_9.webp" alt="Movie 9"></div>
            </div>
        </section>

        <section class="recommended">
            <h2>Most Anticipated Movies</h2>
            <div class="carousel">
                <div><img src="assets/carousel_9.webp" alt="Movie 1"></div>
                <div><img src="assets/carousel_8.webp" alt="Movie 2"></div>
                <div><img src="assets/carousel_7.webp" alt="Movie 3"></div>
                <div><img src="assets/carousel_6.webp" alt="Movie 4"></div>
                <div><img src="assets/carousel_5.webp" alt="Movie 5"></div>
                <div><img src="assets/carousel_4.webp" alt="Movie 6"></div>
                <div><img src="assets/carousel_3.webp" alt="Movie 7"></div>
                <div><img src="assets/carousel_2.webp" alt="Movie 8"></div>
                <div><img src="assets/carousel_1.webp" alt="Movie 9"></div>
            </div>
        </section>

        <section class="categories">
            <h2>Popular Categories</h2>
            <div class="category-list">
                <div class="category">Action</div>
                <div class="category">Drama</div>
                <div class="category">Comedy</div>
                <div class="category">Thriller</div>
                <div class="category">Horror</div>
            </div>
        </section>
    </div>


    <!-- Footer Section -->
    <footer>
        <p>&copy; 2025 WeWatch. All rights reserved.</p>
        <div class="footer-links">
            <a href="#">Privacy Policy</a> |
            <a href="#">Terms of Service</a> |
            <a href="#">Contact Us</a>
        </div>
    </footer>

</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="script/main.js"></script>
</body>
</html>
