
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>

<body>
    <?php include './src/Views/AnHeader.php'; ?>
    <h1>Register</h1>
    <form method="post" id="form-control">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" id="firstname" required><br>
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" id="lastname"><br>
        <label for="username">Username</label>
        <input type="text" name="username" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <input type="submit" value="Register">
    </form>

</body>

</html>