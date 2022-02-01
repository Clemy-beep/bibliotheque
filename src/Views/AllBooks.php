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
                $abstract = $book->getResume();
                $author = $book->getAuthor();
                $editor = $book->getEditor();
                $rates = $book->getRates();
                $id = $book->getId();
                echo "<h2>$title</h2>";
                echo "<p>$abstract</p>";
                echo "<p>Wrote by $author, published by $editor</p>";
                echo "<a href='http://127.0.0.6/edit-book/$id'>Edit Book </a>";
                echo "<button onclick='deleteBook($id)'>Delete book</button>";
                if (!isset($rates)) {
                    foreach ($rates as $key => $rate) {
                        $score = $rate->getRate();
                        echo "$score out of 5";
                        $comment = $rate->getComment();
                        if ($comment !== null) {
                            echo "<p>$comment</p>";
                        }
                    }
                } else echo "<p>No rates fort this book. <a href='http://127.0.0.6/rate-book/$id'>Be the first !</a></p>";
            }
        } else echo "<p>No books available</p>"
        ?>
    </main>
    <?php include './src/Views/footer.php' ?>
</body>
<script>
    function deleteBook(id) {
        conf = confirm('Are you sure you want to delete this book ?');
        if (conf) window.location.href = "http://127.0.0.6/delete-book/" + id;
    }
</script>

</html>