<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
</head>

<body>
    <?php include './src/Views/LoggedHeader.php' ?>
    <main>
        <?php
        $title = $book->getTitle();
        $abstract = $book->getResume();
        $author = $book->getAuthor();
        $editor = $book->getEditor();
        $rates = $book->getRates();
        $id = $book->getId();
        echo "<h2 class='article-title'>$title</h2>";
        echo "<p class='article-content'>$abstract</p>";
        echo "<p>Wrote by <span class='article__author'>$author</span>, published by $editor</p>";
        echo "<a href='http://127.0.0.6/edit-book/$id'>Edit Book </a>";
        echo "<button onclick='deleteBook($id)'>Delete book</button>";
        if (isset($rates[0])) {
            foreach ($rates as $key => $rate) {
                $rateId = $rate->getId();
                $score = $rate->getRate();
                echo "<h3>Rates</h3>";
                echo "<p>$score out of 5</p>";
                $comment = $rate->getComment();
                if ($comment !== null) {
                    echo "<p>$comment</p>";
                }
                $author = $rate->getAuthor()->getUsername();
                echo "<p> Wrote by user $author</p>";
                echo "<a href='http://127.0.0.6/edit-rate/$rateId'>Edit Rate </a>";
                echo "<button onclick='deleteRate($rateId)'>Delete rate</button><br>";
                echo "<a href='http://127.0.0.6/rate-book/$id'> + Add a rate </a>";
            }
        } else echo "<p>No rates fort this book. <a href='http://127.0.0.6/rate-book/$id'>Be the first !</a></p>"; ?>
    </main>
</body>
<script>
    function deleteBook(id) {
        conf = confirm('Are you sure you want to delete this book ?');
        if (conf) window.location.href = "http://127.0.0.6/delete-book/" + id;
    }

    function deleteRate(rateId) {
        conf = confirm('Are you sure you want to delete this rate ?');
        if (conf) window.location.href = "http://127.0.0.6/delete-rate/" + rateId;
    }
</script>

</html>