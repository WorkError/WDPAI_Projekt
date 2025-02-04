<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($categoryName) ?> Movies</title>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/category.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="wrapper">
    <?php include 'partials/header.php'; ?>
    <div class="category-container">
        <h1>Movies in "<?= htmlspecialchars($categoryName) ?>"</h1>
        <div class="movie-list">
            <?php foreach ($movies as $movie): ?>
                <div class="movie-item">
                    <a href="/movie/<?= $movie->getId() ?>">
                        <img src="<?= htmlspecialchars($movie->getImagePath()) ?>" alt="<?= htmlspecialchars($movie->getTitle()) ?>">
                        <p><?= htmlspecialchars($movie->getTitle()) ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="/main" class="back-link">Back to Main Page</a>
    </div>
    <?php include 'partials/footer.php'; ?>
</div>

</body>
</html>
