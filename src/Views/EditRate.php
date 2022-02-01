<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rate</title>
</head>
<body>
    <?php include "./src/Views/LoggedHeader.php" ?>
    <main>
        <h1>Edit this Rate</h1>
        <form method="post" id="form-control">
            <label for="rate">Score</label>
            <input type="number" name="rate" id="rate" value="<?= $rate->getRate() ?>" max="5" min="0">
            <label for="comment">Comment</label>
            <input type="text" name="comment" id="comment" value="<?= $rate->getComment() ?>">
            <input type="submit" value="Modify Rate">
        </form>
    </main>
    
</body>
</html>