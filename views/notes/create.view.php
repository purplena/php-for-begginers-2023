<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <form method="POST" action="/notes">
                        <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                        <div class="mt-1">
                            <textarea id="body" name="body" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required placeholder="your note..."><?= isset($_POST['body']) ? $_POST['body'] : '' ?></textarea>
                            <?php if (isset($errors['body'])) : ?>
                                <p class="text-red-500 text-xs mt-2"><?= $errors['body']; ?></p>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="mt-4 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</main>
<?php require base_path('views/partials/footer.php') ?>