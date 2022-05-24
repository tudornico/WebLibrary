<?php
//add a new book to the database table called clientswithbooks
//update the qunatity of the books in the database table called books

//give off a table of all the books in the database
//make a clickable where u add the book directly
?>
<style>
    table{
        border-collapse: collapse;
        width: 100%;
        text-align: center;
    }
    h1{
        text-align: center;
        font-size: 20px;
    }
</style>
<body background = "background.png"></body>
<h1> All books you want to reserve</h1>

<form action  = "Reservation.php" method="post">
<?php

$query = "SELECT books.BookName,authors.AuthorName,books.Editure FROM books Inner Join authors on books.AuthorId = authors.AuthorId ";
$mysqli = new mysqli("localhost", "root", "", "library");
$result = $mysqli->query($query);
//create a new column in the table where u can click if the you want to add the book then a button to reserve all of the books clicked
echo "<table border='1'>";
echo "<tr><th>Title</th><th>Author</th><th>Editure</th></tr>";
while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$row['BookName']."</td>";
    echo "<td>".$row['AuthorName']."</td>";
    echo "<td>".$row['Editure']."</td>";
    // make the reverse label to call the function reserveBook

    echo "<td><a href='Reserve.php?BookName=".$row['BookName']."'  type='submit'>Reserve</a></td>";
    echo "</tr>";
    // when the button is clicked the book is added to the database table called clientswithbooks
    // the quantity of the book is reduced by 1
    //use the BookName to get the book from the database table called books
    //use the BookName to get the book from the database table called clientswithbooks
    //call the script below on the click of the button
    //if the quantity of the book is 0 then the book is deleted from the database table called books
}
?>
</form>
    <?php
function reserveBook($BookName)
{
    $query = "SELECT BookName FROM books WHERE BookName = '" . $BookName . "'";
    $mysqli = new mysqli("localhost", "root", "", "library");
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $BookName = $row['BookName'];
    //insert query use the username to get the cient iD
    //insert query use the BookName to get the book ID
    //insert query use the client ID and the book ID to insert the book into the database table called clientswithbooks
    $query = "SELECT Quantity FROM books WHERE BookName = '" . $BookName . "'";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $Quantity = $row['Quantity'];
    $Quantity = $Quantity - 1;
    $query = "UPDATE books SET Quantity = '" . $Quantity . "' WHERE BookName = '" . $BookName . "'";
    $mysqli->query($query);

    $query = "Select clients.Id where clients.Username = '" . $_SESSION['username'] . "'";
    $query = "Inser into clientswithbooks(ClientId,BookId) values(1,1)";
}



    //call the function reserveBook on the click of the button and pass the BookName
    //if the quantity of the book is 0 then the book is deleted from the database table called books
?>
</table>

</body>
</html>














