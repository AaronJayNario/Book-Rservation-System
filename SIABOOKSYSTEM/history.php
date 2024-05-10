<?php
include "db.php";
session_start();
?>

<head>
    <meta charset="UTF-8">
    <title>History</title>
    <link href="design/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="navigation" style="">
        <h1>Book Reservation System</h1>
        <img src="img/book.png">

        <p><strong>Welcome: <?= $_SESSION['Efirstname']; ?></strong></p>
        


    </div>

    <img class="background" src="img/book2.webp">


    <div class="libra-post">
        <div class="return-details" style="overflow: hidden;">
        <div class="reserveNAV" style = "position:relative; top: 20px; left:230px;   transform: scale(1);">
        <form method="post">
          <input name="View_All" type="submit" class="book-button" style="background-color: #2196f3" 
            value="View All">
          <input name="View_Cancelled" type="submit" class="author-button" style="background-color: #ff9800"
            value="View Cancelled">
          <input name="View_Approved" type="submit" class="category-button" style="background-color: #f44336"
            value="View Not Yet Returned">      
            <input name="View_Returned" type="submit" class="category-button" style="background-color: black"
            value="View Returned">
        </form>
      </div>
      <?php
// Fetch and display return details for accepted reservations
$QUERY = "SELECT r.ReturnID, r.ReserveID, b.BookNames, r.UserID, e.firstname, r.DateApproved, r.DateReturn, r.Status
          FROM returntable r
          JOIN reservetable res ON r.ReserveID = res.ReserveID
          JOIN booktable b ON res.BookID = b.BookID
          JOIN `employe table` et ON r.UserID = et.UserID
          JOIN tbempinfo e ON et.empid = e.empid ";

if (isset($_POST['View_All'])) {
    $query = $QUERY;
} else if (isset($_POST["View_Cancelled"])) {
    $query = $QUERY . " WHERE r.`Status` = 'Cancelled'";
} else if (isset($_POST["View_Approved"])) {
    $query = $QUERY . " WHERE r.`Status` = 'Not Yet Returned'";
} else if (isset($_POST["View_Returned"])) {
    $query = $QUERY . " WHERE r.`Status` = 'Returned'";
} else {
    $query = $QUERY;
}


$resultReturn = $conn->query($query);


if (!$resultReturn) {
  die("Error in SQL query: " . $conn->error);
}
if ($resultReturn->num_rows > 0) {
    // Display a table of return details
    echo "<h3>Return Details</h3>
            <table class='table table-bordered table-striped table-hover'>
                <thead class='thead-dark'>
                    <tr>
                        <th>ReturnID</th>
                        <th>ReserveID</th>
                        <th>Book Name</th>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Date Approved</th>
                        <th>Date Return</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";

    while ($rowReturn = $resultReturn->fetch_assoc()) {
        $varvar = $rowReturn['ReserveID'];
        echo "<tr>
        <td>{$rowReturn['ReturnID']}</td>
        <td>{$rowReturn['ReserveID']}</td>
        <td>{$rowReturn['BookNames']}</td>
        <td>{$rowReturn['UserID']}</td>
        <td>{$rowReturn['firstname']}</td>
        <td>{$rowReturn['DateApproved']}</td>
        <td>{$rowReturn['DateReturn']}</td>
        <td>{$rowReturn['Status']}</td>";

        if ($rowReturn['Status'] == "Not Yet Returned") {
            echo "<td><a href='updateRes.php?res_Id={$varvar}' class='btn btn-success'> Returned </a></td>";
        } else {
            echo "<td></td>";
        }
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
  
    echo "<p class='alert alert-info'>No return details available.</p>";
}

$conn->close();
?>
            <form method='post' action='admin.php'>
                <button type='submit' class='btn btn-warning' name='warning'>Go back</button>
            </form>
        </div>
    </div>
</body>

</html>