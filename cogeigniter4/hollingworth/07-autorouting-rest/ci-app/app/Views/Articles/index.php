<!-- V2: Using layout -->
<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Articles<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <!-- Use named route for easier URL generation -->
     <a href="<?= url_to("new_article") ?>">New</a>
    <!-- Previous hardcoded URL: url_to("Articles::new") -->
   

    <h1>Articles List</h1>
     <!-- $articles argument is sent from the controller -->
     <?php foreach ($articles as $article): ?>

         <article>
            <!-- Now using the Article entity, so change from $article["title"] to $article->title -->
            <h2><a href="<?= site_url('/articles/' . $article->id) ?>"><?= esc($article->title) ?></a></h2>
            <p><?= esc($article->content) ?></p>
        </article>

    <?php endforeach; ?>



<?= $this->endSection() ?>