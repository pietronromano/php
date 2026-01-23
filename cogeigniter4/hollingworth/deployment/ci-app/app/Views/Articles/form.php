<!-- Shared form for new and edit views -->
<label for="title">Title</label>

<!-- Now using the Article entity, so change from $article["title"] to $article->title -->
<input type="text" id="title" name="title" value="<?= old("title", esc($article->title)) ?>">

<label for="content">Content</label>
<textarea id="content" name="content"><?= old("content", esc($article->content)) ?></textarea>
<button>Save</button>