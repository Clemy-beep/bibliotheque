<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
</head>

<body>
    <?php include './src/Views/LoggedHeader.php';
    $title = $book->getTitle();
    $resume = $book->getResume();
    $author = $book->getAuthor();
    $editor = $book->getEditor();
    $exemplaries = $book->getExemplaries();
    ?>
    <main>
        <h1>Edit Book</h1>
        <form method="post" id="form-control">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?= $title ?>">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" value="<?= $author ?>">
            <label for="exemplaries">Exemplaries</label>
            <input type="number" name="exemplary" id="exemplary" value="<?= $exemplaries ?? 0 ?>">
            <label for="editor">Editor</label>
            <input type="text" name="editor" id="editor" value="<?= $editor ?>">
            <label for="resume">Abstract</label>
            <textarea name="resume" id="resume" cols="30" rows="10"><?= $resume ?></textarea>
            <input type="submit" value="Edit book">
        </form>
    </main>
    <?php include './src/Views/footer.php' ?>
</body>

</html>