<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
</head>

<body>
    <?php include './src/Views/LoggedHeader.php' ?>
    <main>
        <h1>All books</h1>
        <?php
        if (!empty($books)) {
            foreach ($books as $key => $book) {
                $title = $book->getTitle();
                $id = $book->getId();
                echo "<div class='container-article'><h2 class='article-title'><a href='http://127.0.0.6/book/$id'>$title</a></h2></div>";
            }
        } else echo "<p>No books available</p>"
        ?>
    </main>
    <?php include './src/Views/footer.php' ?>
</body>

</html>