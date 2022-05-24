<?php

// get the name of the book from the title of the page and execute the add in the reservation table
//get the table id from the name given in the title of the page
//get the cleint id from the file CurrentUser
$BookName = $_GET['BookName'];

$query = "Select BookID From Books Where Books.BookName = '".$BookName."'";
$mysqli = new mysqli("localhost", "root", "", "library");

$BookIDResult = $mysqli -> query($query);

$BookID = $BookIDResult -> fetch_assoc();
$BookID = $BookID['BookID'];
$file = fopen("CurrentUser","r");
$username = file_get_contents("CurrentUser.txt");
$query = "Select ID From Clients Where Email= '".$username."'";

$ClientID =$mysqli ->query($query);
$ClientID = $ClientID->fetch_assoc();
$ClientID = $ClientID['ID'];

$query = "Insert into Reservations Values ('".$ClientID."','".$BookID . "')";

$mysqli->query($query);

$imageName = $BookName . ".jpg";

?>
<body background = "background.png"></body>
<h1 > We wait for you to take the book tomorrow</h1>
<?php


  echo "<img src = '$imageName'>"
 ?>
<br>
<a href ="Reservation.php" > Thank you for the Reservation</a>


