<?php
//make arrows from the title to the labels with the hrefs
?>
<title>LogIn</title>
<style>
    h1{
        text-align: center;
        font-size: 20px;
        font-family: sans-serif;
    }

    .container{
        width: 400px;
        height: 400px;
        margin: 0 auto;
        background-color: #f2f2f2;
        padding: 20px;
    }


    a{
        text-decoration: none;
        color: black;
        text-space: 10px;
        text-underline-mode: one-underline;
    }
</style>
<h1>
   Welcome to the library !
</h1>
    <body style="background-image: url('background.png');">
<?php
//import the class singleton.php or namespace

$sqlli = new mysqli("localhost","root","","library");

$ExistentPassword = $sqlli -> query("Select clients.Password From clients where Email = '".$_POST["username"]."'");
//we want to get the password from the database
$ExistentPassword = $ExistentPassword -> fetch_assoc();
$PasswordValue = $ExistentPassword["Password"];
//keep the username value from $_Post["username"] so we can use it in SeeDeadline.php
//this doesn t work
$_SESSION["username"] = $_POST["username"];
//give the username as the variable in Singleton class using full path
//print the username inside the file CurrentUser.txt
//delete the data in the file CurrentUser.txt



$file = fopen("CurrentUser.txt","w");
//delete all data inside the file
file_put_contents("CurrentUser.txt","");
fwrite($file,$_POST["username"]);
fclose($file);

    if ($PasswordValue == $_POST["password"]){
        //we want to greet the user
        // give them a button to get started on the rest of the application
        //create a pop up window that says "Welcome to the library" and then a button to get started
        //also greet them by name and tell them what they can do
        //place the labels in the center of the page in a line and make arrows from the title to the labels with the hrefs
        //place the log out in the bottom of the page
        //put the labels of SeeDeadline.php in the center of the page next to the Search label and make arrows from the title to them

    ?>


        <a href="SeeDeadlines.php">
            <h2 class = "Deadlines">
                See your deadlines
            </h2>
        </a>
        <a href="Search.php" >
            <h2 class = "Search">
                Search for any book
            </h2>
        </a>

        <a href = "Reservation.php">
            <h2 class = "Reservation">
                Reserve a book
            </h2>
        </a>
        <a href="LogOut.php">
            <h3 >
                Log out
            </h3>
        </a>






    <?php

    }
    else{
        echo "Wrong Password";
    }


