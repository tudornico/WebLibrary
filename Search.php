<?php

//make a search form on the database and display the results
//searches can be done on Author and Title
//create a form to search for a book
//create a form to search for an author
//create a form to search for a title
 //create the textbox for the search
 //create the submit button
 //create a table to display the results
//make the form not change the page

?>
<style>
    h1{
        text-align: center;
        font-size: 20px;
    }
</style>
<h1>
    Search for a Book with the name of the Author or Title
</h1>
<body background="background.jpg"></body>
<form  action="SearchAlgorithm.php" method="post">
        <label for="authorName">Search For Author Name:</label>
<label>
    <input type="text" name="authorName" placeholder="Search">
</label>

<label for = "bookTitle">Search For Title:</label>
<label>
    <input type="text" name = "bookTitle" placeholder="Search">
</label>
<input type="submit" value="Search">
</form>
