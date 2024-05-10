<?php
include "db.php";
session_start();

define('ADMIN_CONTACT', '0000');
define('ADMIN_PASSWORD', '0000');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $cont = $_POST['contact'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM `employe table` WHERE `contact` = '{$cont}'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $_SESSION['UserID'] = $row['UserID'];
        $empid = $row['empid'];
        $admin = $row['admin'];
        $contd = $row['contact'];
        $passd = $row['password'];

        $query = "SELECT * FROM `tbempinfo` WHERE `empid` = '{$empid}'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['Efirstname'] = $row['firstname'];
            $_SESSION['Elastname'] = $row['lastname'];
            $_SESSION['Edepartment'] = $row['department'];
        }

        if ($admin  == "yes") {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin.php');
    } else {
        $error_message = 'You need to be Admin first!';

    }



    } else {

     
        if ($_POST['contact'] === ADMIN_CONTACT && $_POST['password'] === ADMIN_PASSWORD) {
            // Set the session variable to indicate that the user is logged in
            $_SESSION['admin_logged_in'] = true;
            header('Location: admin.php');
            exit();
        } else {
            // Display an error message if the credentials are incorrect
            $error_message = 'Invalid username or password';
        }

        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
            header('Location: admin.php');
            exit();
        }



    }

    mysqli_close($conn);
}



// $query = "SELECT * FROM `logintable` WHERE `StudentID` = '{$_SESSION['StudentID']}'";
// $result = $conn->query($query);

// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     $passd = $row['Password'];
// } 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Reservation System</title>
    <link rel="icon" type="image/x-icon" href="/img/book-16.png">
    <link rel="stylesheet" href="Admin_login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="navigation">
        <h1>Book Reservation System</h1>
        <img src="img/book.png" alt="BSU Logo">
    </div>
    <img class="background" src="img/book2.webp">
   
    <div class="login-form">
    <h2>ADMIN LOGIN</h2>
        
        <?php if (isset($error_message)): ?>
            <p class="error">
                <?php echo $error_message; ?>
            </p>
        <?php endif; ?>

        <form method="post" action="">
        <br>
            <label for="contact"></label>
            <input type="text" id="contact" name="contact" placeholder="Contact" required>

            <label for="password"></label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>
