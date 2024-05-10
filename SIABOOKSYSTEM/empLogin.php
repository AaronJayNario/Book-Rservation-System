<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMPLOYEE LOGIN</title>
    <link href="design/login_style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


</head>

<body>
    

    <div class="login-container">
    <header>
        <img src="img/book.png"><br>
        <h1>BOOK RESERVATION SYSTEM</h1>
    </header>
    <br><br>
        <h2>EMPLOYEE LOGIN</h2>
        <form id="login-form" action="server.php" method="post">
            <input type="text" id="contact" name="contact" placeholder="Username">
            <input type="password" id="password" name="password" placeholder="Password"><br><br>
            <input name="loginCheck2" type="submit" value="Login">
        </form>
    </div>
    <img class="background" src="img/books.jpg">
</body>

</html>