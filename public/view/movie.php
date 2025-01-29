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
        <h3>Comments</h3>
        <ul>
            <?php foreach ($comments as $comment): ?>
                <li>
                    <strong><?= htmlspecialchars($comment['nickname']) ?></strong> (<?= htmlspecialchars($comment['created_at']) ?>):<br>
                    <?= htmlspecialchars($comment['content']) ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php if (isset($_SESSION['user_id'])): ?>
            <form method="POST" action="/movie/<?= $movie->getId() ?>/add_comment">
                <textarea name="content" placeholder="Write a comment..." required></textarea>
                <button type="submit">Add Comment</button>
            </form>
        <?php else: ?>
            <p>You need to <a href="/login">log in</a> to add a comment.</p>
        <?php endif; ?>
    </div>

</div>
</body>
</html>
