<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>This is SignUp page.</p>
        <form method="POST">
            <ul>
                <li class="mt-3"><label for="uid" class="block">Uid:</label><input id="uid" type="text" name="uid" placeholder="User Name"></li>


                <li class="mt-3"><label for="pwd" class="block">Password:</label><input id="pwd" type="password" name="pwd" placeholder="password"><span> (密碼長度限1 ~ 4 碼)</span></li>
            </ul>

            <?php if (!empty($message)) : ?>
                <?php foreach ($message as $messageStatus => $context) : ?>
                  <p class="text-red-500"><?= $context ?></p>
                <?php endforeach; ?>
            <?php endif; ?>

            <button type="submit" class="block mt-3 hover:underline">Sign up</button>
            <!-- <?php dumpDie($message); ?> -->
        </form>
    </div>
</main>

<?php require base_path('views/partials/foot.php'); ?>