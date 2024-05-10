<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Add</title>
    <link href="design/add_style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
    <header>
        <img src="img/user.webp">
        <h1>Add New Book</h1>
    </header>
    <img class="background" src="img/book2.webp">

    <div class="login-container">
        <form id="register-form" action="insertBook.php" method="post">
            <div class="form-group">
                <label for="user">Book Name</label>
                <input type="text" name="bookName" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Book Description</label>
                <input type="text" name="bookDes" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="pass">Book Author</label>
                <input type="text" name="bookAut" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="pass">Book Category</label>
                <input type="text" name="bookCat" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="pass">Book ISBN</label>
                <input type="text" name="bookISBN" class="form-control" required>
            </div>

            <div class="form-group">
                <input type="submit" name="add_Book" class="btn btn-primary mt-2" value="Add">
            </div>
        </form>
        <form class="mt-4" style="" method='post' action='adminBook.php'>
            <button type='submit' class='btn btn-warning' name='warning'>Go back</button>
        </form>
    </div>

    <img class="background" src="img/books.jpg">

</body>

</html>
