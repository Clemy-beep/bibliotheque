<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Book</title>
</head>

<body>
    <?php include './src/Views/LoggedHeader.php' ?>
    <main>
        <h1>Rate book n°<?= $id ?></h1>
        <form method="post" id="form-control">
            <label for="rate">Rate</label>
            <input type="number" name="rate" id="rate" max="5" min="0">
            <label for="comment">Comment</label>
            <input type="text" name="comment" id="comment">
            <input type="submit" value="Rate this book">
        </form>
    </main>
</body>

</html>