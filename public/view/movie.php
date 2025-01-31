<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($movie->getTitle()) ?></title>
    <link rel="stylesheet" href="/css/movie.css">
</head>
<body>
<div class="wrapper">
    <?php include 'partials/header.php'; ?>
    <div class="movie-container">
        <div class="movie-columns">
            <div class="movie-poster">
                <img src="<?= htmlspecialchars($movie->getImagePath()) ?>" alt="<?= htmlspecialchars($movie->getTitle()) ?>">
            </div>
            <div class="movie-details">
                <h1><?= htmlspecialchars($movie->getTitle()) ?></h1>
                <p><?= htmlspecialchars($movie->getDescription()) ?></p>
                <div class="categories">
                    <h3>Categories</h3>
                    <div class="category-buttons">
                        <?php foreach ($movie->getCategories() as $category): ?>
                            <a href="/category/<?= urlencode($category) ?>" class="category-button">
                                <?= htmlspecialchars($category) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="comments">
            <h3>Comments</h3>
            <ul>
                <?php foreach ($comments as $comment): ?>
                    <li>
                        <div class="comment-header">
                            <strong><?= htmlspecialchars($comment['nickname']) ?></strong>
                            <span class="timestamp"><?= date('Y-m-d H:i', strtotime($comment['created_at'])) ?></span>
                        </div>
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
    <?php include 'partials/footer.php'; ?>
</div>
</body>
</html>
