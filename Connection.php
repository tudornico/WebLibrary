<?php
// make the backgroud colour of the page to background.jpg
?>
<style>
    h1{
        text-align: center;
        font-size: 20px;
    }
    label{
        font-size: 20px;

    }
</style>
<body style="background-image: url('background.png');">
<h1>Please sign in </h1>
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbName = "library";

$mysqli = new mysqli("localhost", "root", "", "library");


// Check connection
$connected = true;
$error = "";
if ($mysqli->connect_errno) {
    $connected = false;
    $error = $mysqli->connect_error;
}

// allign the buttons and labels to the center
// the form must stay
//set more spacing between the buttons and labels
if ($connected) {
    ?>
    <form method="post" action = "CheckingPassword.php">
        <br>
        <br>
    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required placeholder="Email">
    </p>
    <p>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Password"/>

        </p>
        <p>

    <button  type="submit"  id = "button1"> Register</button>
        </p>
    </form>
    <?php

} else {
    ?>
    <h1>Nu s-a putut conecta :( </h1>
    <h3>Eroare: </h3>
    <?php
}


?>