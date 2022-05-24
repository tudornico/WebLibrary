<?php
//we want to use the class Singleton
include 'Singleton.php';
//set the background to background.jpg
?>
<style>
title{
    font-size: 20px;
    font-weight: bold;
    text-align: center;
    text-underline-mode: single;
}
h1{
    font-size: 20px;
    font-weight: bold;
    text-align: center;
    text-underline-mode: single;
}
</style>
<body background="background.png">
<title>See Deadlines</title>
<body>
<h1>All Books that you have</h1>
</body>
<?php
//take the name of the client and create a table for all the books he has
//and show the deadline of each book
$query = "Select clients.FirstName,clients.LastName,clientswithbooks.TakenDate,clientswithbooks.DeadLine,books.BookName ".
"From clients Inner Join clientswithbooks On clients.ID = clientswithbooks.ClientID ".
"Inner Join books On clientswithbooks.BookID = books.BookID ".
"Where clients.Email = :email";
//create an sql statment and bind the email to the query
$db = new PDO('mysql:host=localhost;dbname=library', 'root', '');
$stmt = $db->prepare($query);
//get the username we used on the CheckingPassword.php page
//give $email the value from CurrentUser.txt
$email = file_get_contents('CurrentUser.txt');
//bind the email to the query

$stmt->bindValue(':email', $email);
//execute the query
$stmt->execute();
//get the result
$result = $stmt->fetchAll();
//create a table and populate from the result
?>


<style>
    table{
        border-collapse:collapse;
        border:1px solid black;
        margin:0 auto;
        width:100%;
    }
    tr{
        border:1px solid black;
        }
    td{
        border:1px solid black;
        padding:5px;
        text-align: center;
    }
    th{
        border:1px solid black;
        padding:5px;
        text-align: center;
    }
</style>




<table>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Take Date</th>
<th>Deadline</th>
<th>Book Name</th>
</tr>



<?php

function get_current_date($date){
    $date = date_create($date);
    $date = date_format($date, 'Y-m-d');
    return $date;
}

//create a function to print the deadlines with the correct colours and text
function print_deadline($deadline){
    $current_date = get_current_date(date('Y-m-d'));
    $deadline = get_current_date($deadline);
    if($deadline < $current_date){
        echo "<td style='color:red;'>".$deadline."</td>";
    }
    else{
        echo "<td style ='color:black;'>".$deadline."</td>";
    }
}


foreach ($result as $row) {
?>
<tr>
<td><?php echo $row['FirstName']; ?></td>
<td><?php echo $row['LastName']; ?></td>
<td><?php echo $row['TakenDate']; ?></td>
<?php
print_deadline($row['DeadLine']);
?>
<td><?php echo $row['BookName']; ?></td>
</tr>
<?php
}
