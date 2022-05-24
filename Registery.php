<?php
?>
<form action="Connection.php" id="ConnectionForm">
<?php
$mysqli = new mysqli("localhost", "root", "", "library");

$username = file_get_contents("CurrentUser.txt");
$query = "Update clients SET FirstName = '" . $_POST['FirstName'] . "' , LastName = '" .$_POST['LastName'] . "' , Birthday = '"
    . $_POST['BirthDate'] . "' Where Email = '".$username."'" ;
$mysqli->query($query);

?>

</form>
<script type="text/javascript">
    document.getElementById('ConnectionForm').submit();
</script>