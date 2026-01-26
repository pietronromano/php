<!-- V2: Using layout -->
<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Articles<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <!-- see  -->
    <a href="<?= url_to("Articles::new") ?>">New</a>

    <h1>Articles List</h1>
     <!-- $articles argument is sent from the controller -->
     <?php foreach ($articles as $article): ?>

        <article>
            <!-- site_url() helper function generates a full URL for the given path
                makes links work regardless of where the app is hosted 
            -->
            <h2><a href="<?= site_url('/articles/' . $article["id"]) ?>"><?= $article["title"] ?></a></h2>
            <p><?= $article["content"] ?></p>
        </article>

    <?php endforeach; ?>



<?= $this->endSection() ?>