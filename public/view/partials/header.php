<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeWatch</title>
    <link rel="stylesheet" href="/public/css/main.css">
</head>
<header>
    <nav class="navbar">
        <div class="logo"><a href="/main">WeWatch</a></div>
        <div class="menu">
            <li class="dropdown">
                <a href="#" class="dropbtn">Categories</a>
                <div class="dropdown-content">
                    <?php foreach ($categories as $category): ?>
                        <a href="/category/<?= urlencode($category) ?>"><?= htmlspecialchars($category) ?></a>
                    <?php endforeach; ?>
                </div>
            </li>
            <li>
                <a href="/profile/<?= $_SESSION['user_id'] ?>">
                    <i class="ri-user-line"></i> <?= htmlspecialchars($_SESSION['nickname']) ?>
                </a>
            </li>
            <li><a href="/logout">Logout</a></li>
        </div>
    </nav>
</header>
