<?php require( 'partials/head.php') ?>
<?php require( 'partials/nav.php') ?>
<?php require( 'partials/banner.php') ?>
<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="mt-5 md:col-span-2 md:mt-0">
        <form method="POST">
          <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
              <div>
                <label for="body" class="block text-sm font-medium text-gray-700">
                  Body
                </label>
                <div class="mt-1">
                  <textarea name="body" id="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Your text here"><?= $_POST['body'] ?? '' ?></textarea>
                </div>
                <?php if (isset($errors['body'])) : ?>
                  <p class="text-red-500 mt-2"><?= $errors['body'] ?></p>
                <?php endif; ?>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<?php require( 'partials/footer.php') ?>