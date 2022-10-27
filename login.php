<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="form">
        <h2>Login</h2>
        <form action="" autocomplete="">
            <div class="error-text">Error</div>
            <div class="input">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter Email" required>
            </div>
            <div class="input">
                <label>Password</label>
                <input type="password" name="pass" placeholder="Enter Password" required>
            </div>
            <div class="submit">
                <input type="submit" value="Login" class="button">
            </div>
        </form>
        <div class="link">Not signedup? <a href="register.php">Signup Now</a></div>
    </div>
    <script src="login.js"></script>
</body>
</html>