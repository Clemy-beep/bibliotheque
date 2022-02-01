<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add book</title>
</head>

<body>
    <?php include "./src/Views/LoggedHeader.php" ?>
    <main>
        <form method="post" id="form-control">
            <label for="isbn">ISBN</label>
            <input type="number" name="isbn" id="isbn">
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
            <label for="author">Author</label>
            <input type="text" name="author" id="author">
            <label for="editor">Editor</label>
            <input type="text" name="editor" id="editor">
            <label for="exemplaries">Exemplaries</label>
            <input type="number" name="exemplaries" id="exemplaries" required>
            <label for="resume">Resume</label>
            <textarea name="resume" id="resume"></textarea>
            <input type="submit" value="Create book">
        </form>
    </main>
</body>

</html>