

<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?><br>
Your major is: <?php echo $_POST["major"]; ?><br>
Your comments: <?php echo $_POST["comment"]; ?> <br>
Your continents: <?php echo $_POST["continents"]; ?>
    <?php
if (isset($_POST['continents'])){
echo $_POST['continents']; // Displays value of checked checkbox.
}
?>

</body>
</html>


