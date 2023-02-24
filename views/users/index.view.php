<?php require __DIR__ . '/../partials/head.php'; ?>
<?php require __DIR__ . '/../partials/nav.php'; ?>
<?php require __DIR__ . '/../partials/banner.php'; ?>

<main>
    <form method="POST">
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <table class="table-auto">
                <tr>
                    <thead>
                        <th>Uid</th>
                        <th></th>
                        <th>Email</th>
                        <th></th>
                        <th>Role</th>
                        <th></th>
                        <th>Function</th>
                        <th></th>
                    </thead>
                </tr>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($user["Uid"]) ?>

                                <input name="id" value="<?= $user["Id"] ?>">
                            </td>
                            <td></td>

                            <td>
                                <?= htmlspecialchars($user['email']) ?>
                            </td>
                            <td></td>
                            <td>
                                <?= htmlspecialchars($user['Role']) ?>
                            </td>
                            <td></td>

                            <td>
                                <a href="/user?id=<?= $user["Id"] ?>" class="text-blue-500 hover:underline">Edit</a>
                            </td>
                            <td></td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>

            <section class="btn">
                <span class="mt-5 p-4 inline-block hover:underline">
                    <a href="/" class="text-red-500">Go back Home</a>
                </span>
            </section>

        </div>
    </form>
</main>
<?php require __DIR__ . '/../partials/foot.php'; ?>