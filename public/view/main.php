<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page - Forum</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
    <header>
        <nav class="navbar">
            <div class="logo"><a href="main">WeWatch</a></div>
            <div class="menu">
                <li class="dropdown">
                    <a href="#" class="dropbtn">Categories</a>
                    <div class="dropdown-content">
                        <?php foreach ($categories as $category): ?>
                            <a href="category/<?= urlencode($category) ?>"><?= htmlspecialchars($category) ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>
                <li>
                    <a href="profile/<?= $_SESSION['user_id'] ?>">
                        <i class="ri-user-line"></i> <?= htmlspecialchars($_SESSION['nickname']) ?>
                    </a>
                </li>
                <li><a href="logout">Logout</a></li>
            </div>
        </nav>
    </header>
    <div class="slider">
        <div class="slides">
            <div class="slide"><img src="/public/assets/slider_1.jpg" alt="Slide 1"></div>
            <div class="slide"><img src="/public/assets/slider_2.jpg" alt="Slide 2"></div>
            <div class="slide"><img src="/public/assets/slider_3.jpg" alt="Slide 3"></div>
        </div>
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
    </div>

    <div class="main_content">
        <section class="about-forum">
            <div class="about-container">
                <h2>Welcome to WeWatch</h2>
                <p>Join our vibrant community of movie and TV show enthusiasts. Discuss your favorite films/shows, share reviews, and discover new cinematic experiences. Whether you're a casual viewer or a passionate cinephile, WeWatch is the perfect place to engage with others who share your interests.</p>
            </div>
        </section>
        <section class="recommended">
            <h2>Recommended Movies</h2>
            <div class="custom-carousel">
                <div class="carousel-container">
                    <div class="carousel-track">
                            <?php foreach ($movies as $movie): ?>
                                <div class="carousel-item">
                                    <a href="/movie/<?=$movie->getId()?>">
                                        <img src="<?= htmlspecialchars($movie->getImagePath()) ?>" alt="<?= htmlspecialchars($movie->getTitle()) ?>">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                    </div>
                </div>
                <button class="carousel-prev">&#10094;</button>
                <button class="carousel-next">&#10095;</button>
            </div>
        </section>

        <section class="categories">
            <h2>Popular Categories</h2>
            <div class="category-list">
                <?php foreach ($categories as $category): ?>
                    <a href="category/<?= urlencode($category) ?>">
                        <div class="category"><?= htmlspecialchars($category) ?></div>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2025 WeWatch. All rights reserved.</p>
        <div class="footer-links">
            <a href="#">Privacy Policy</a> |
            <a href="#">Terms of Service</a> |
            <a href="#">Contact Us</a>
        </div>
    </footer>

</div>

<script src="script/main.js"></script>
</body>
</html>
