<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>New Article<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>New Article</h1>

    <!-- Check in the session for validation errors -->
    <?php if (session()->has("errors")): ?>

        <ul>
            <?php foreach(session("errors") as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>

    <?php endif; ?>

    <!-- use the form helper, see BaseController: $helpers = ["form"]; -->
    <?= form_open("articles/create") ?>

         <!-- old() function to repopulate form fields after validation errors -->
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?= old("title") ?>">

        <label for="content">Content</label>
        <textarea id="content" name="content"><?= old("content") ?></textarea>

        <button>Save</button>

    </form>
<?= $this->endSection() ?>