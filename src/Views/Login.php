<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php include './src/Views/AnHeader.php' ?>
    <main>
        <h1>Sign in</h1>
        <form method="post" id="form-control">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <input type="submit" value="Sign in">
        </form>
    </main>
    <?php include './src/Views/footer.php' ?>
    
</body>
</html>