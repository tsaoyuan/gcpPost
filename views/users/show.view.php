<?php require __DIR__ . '/../partials/head.php'; ?>
<?php require __DIR__ . '/../partials/nav.php'; ?>
<?php require __DIR__ . '/../partials/banner.php'; ?>

<main>
    <form action="" method="POST">
        <table class="table-auto">
            <tr>
                <thead>
                    <th>Uid</th>
                    <th></th>
                    <th>Email</th>
                    <th></th>
                    <th>Role Option</th>
                    <th></th>
                    <th>Function</th>
                    <th></th>
                </thead>
            </tr>
            <tbody>
                <tr>
                    <td>
                        <?= htmlspecialchars($result["Uid"]) ?>

                        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
                    </td>
                    <td></td>

                    <td>
                        <?= htmlspecialchars($result['email']) ?>
                    </td>
                    <td></td>
                    <td>
                        <select name="role">
                            <!-- <option value="" disabled >Choose option</option> -->
                            <option value="Admin" <?php if ($result["Role"] === "Admin") echo 'selected="selected"'; ?>>Admin</option>

                            <option value="Regular" <?php if ($result["Role"] === "Regular") echo 'selected="selected"'; ?>>Regular</option>

                            <option value="" <?php if ($result["Role"] === "") echo 'selected="selected" disabled'; ?>>Choose option</option>
                        </select>
                    </td>
                    <td></td>

                    <td>
                        <input type="submit" name="edit" value="Edit" class="block text-blue-500 hover:underline">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </form>

    <section class="btn">
        <span class="mt-5 p-4 inline-block hover:underline">
            <a href="/users" class="text-red-500">Go back Manage Account</a>
        </span>
    </section>

    <?php require __DIR__ . '/../partials/foot.php'; ?>