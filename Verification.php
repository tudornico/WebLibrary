<?php

$query = "Select ID From clients where Email = ' ".$_POST['email']."'";

$mysqli = new mysqli("localhost", "root", "", "library");

$clientID = $mysqli ->query($query);
$ID = $clientID->fetch_assoc();
$myID = $ID['ID'];
if(is_int($myID)) {
    echo "Sorry there is already someone with this email";
}
else{

    $query = "Select max(ID) as maxID From clients";
    $maxID = $mysqli->query($query);
    $currentID = $maxID->fetch_assoc();
    $ID = $currentID['maxID'];
    $ID +=1;
    $query = "Insert into clients(Email,Password,ID) Values ( '".$_POST['email']."' , '".$_POST['password']."', '" . $ID . "')";
    $file = fopen("CurrentUser.txt","w");
//delete all data inside the file
    file_put_contents("CurrentUser.txt","");
    fwrite($file,$_POST["email"]);
    fclose($file);
    $mysqli->query($query);
        ?>
    <body style="background-image: url('background.png');">
            <label> you have been succesfully registered </label>
    <br>
            <a href =PersonalInfo.php> We need some more details</a>
    </body>
        <?php
    }
