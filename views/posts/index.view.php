<?php require __DIR__ . '/../partials/head.php'; ?>
<?php require __DIR__ . '/../partials/nav.php'; ?>
<?php require __DIR__ . '/../partials/banner.php'; ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php foreach ($posts as $post) : ?>
            <li>
                <?php if ($post["Uid"] === $_SESSION["uid"]) : ?>
                    <a class="underline hover:text-orange-400" href="/post?id=<?= $post['Id'] ?>">
                <?php endif ?>

                <?= htmlspecialchars($post['Title']) ?></a>
            </li>

        <?php endforeach; ?>
        <section class="btn">
            <span class="mt-5 p-4 inline-block hover:underline">
                <a href="/" class="text-red-500">Go back Home</a>
            </span>

            <span class="mt-5 p-5 inline-block hover:underline">
                <a href="/posts/create" class="text-blue-700">Create Post</a>
            </span>
        </section>
    </div>
</main>

<?php require __DIR__ . '/../partials/foot.php'; ?>