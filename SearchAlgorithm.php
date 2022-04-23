<?php
function search($authorName, $bookTitle)
{
    $db = new PDO('mysql:host=localhost;dbname=library', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception thus the script will stop if there is an error
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //make the query work with only one field being searched
    $query = "Select * From books";

    if ($authorName == "" and $bookTitle != "")
    {   //make the value like %$authorName% so that it can be searched but keep it parameterized
        $query = "SELECT * FROM books WHERE BookName LIKE :bookTitle";

    }
    else if ($bookTitle == "" and $authorName != "")
    {
        $query = "SELECT * FROM books  Inner Join authors on books.AuthorId = authors.AuthorId WHERE  authors.AuthorName LIKE :authorName";

    }
    if( $authorName !="" and $bookTitle != "") {
        $query = "SELECT * FROM books Inner Join authors on authors.AuthorId = books.AuthorId WHERE AuthorName = :authorName OR BookName = :bookTitle";
    }
    $stmt = $db->prepare($query);
    //bind the values to the query only when needed
    if ($authorName != "")
    {
        $stmt->bindParam(':authorName', $authorName);
    }

    if ($bookTitle != "")
    {
        $stmt->bindParam(':bookTitle', $bookTitle);
    }


    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}

//print the data from the query in a table

//create a table
//set spacing between rows and columns
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
    h1{
        text-align: center;
        font-size: 20px;

    }

</style>
<body background="background.jpg">
<h1>The Books we found for you ! </h1>
    <table class = "BookTable" >

        <tr class ="BooksHeader">

            <th>Title</th>
            <th>Editure</th>
            <th>Genre</th>
            <th>Price</th>
            <th>Quantity</th>

        </tr>
        <?php
        //loop through the data and display it in a table
        //use the sqlli - > fetch_assoc() to get the data
        //display the data in a table
        // use the function to piut the data inside the table
        $authorName = $_POST['authorName'];
        $bookTitle = $_POST['bookTitle'];
        $data = search($authorName, $bookTitle);
        foreach ($data as $row) {
            ?>
            <tr>
                <td ><?php echo $row['BookName']; ?></td>
                <td ><?php echo $row['Editure']; ?></td>
                <td ><?php echo $row['Genre']; ?></td>
                <td><?php echo $row['Price']; ?></td>
                <td><?php echo $row['Number_Of_Copies']; ?></td>
            </tr>
            <?php
        }
        ?>