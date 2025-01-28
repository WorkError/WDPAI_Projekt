<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($movie->getTitle()) ?></title>
    <link rel="stylesheet" href="/css/movie.css">
</head>
<body>
<div class="movie-container">
    <h1><?= htmlspecialchars($movie->getTitle()) ?></h1>
    <img src="<?= htmlspecialchars($movie->getImagePath()) ?>" alt="Movie Image">
    <p><?= htmlspecialchars($movie->getDescription()) ?></p>
    <div class="categories">
        <h3>Categories:</h3>
        <ul>
            <?php foreach ($movie->getCategories() as $category): ?>
                <li><a href="/category/<?= urlencode($category) ?>"><?= htmlspecialchars($category) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="comments">
        <h3>Comments:</h3>
        <form method="POST" action="/movie/<?= $movie->getId() ?>/add_comment">
            <textarea name="comment" placeholder="Add your comment..." required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
