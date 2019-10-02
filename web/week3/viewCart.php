<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">
        <title>Shopping Cart</title>

    </head>
    <body>
        <?php
// Set session variables
        $_SESSION["andes"] = "andes";
        $_SESSION["bear"] = "bear";
        $_SESSION["hearts"] = "hearts";
        $_SESSION["lightbulb"] = "lightbulb";
        $_SESSION["marbeling"] = "marbeling";
        $_SESSION["monster"] = "monster";
        $_SESSION["onsie"] = "onsie";
        $_SESSION["paint"] = "paint";
        $_SESSION["ruffles"] = "ruffles";
        $_SESSION["smores"] = "smores";
        $_SESSION["topFlower"] = "topFlower";
        $_SESSION["trailingFlowers"] = "trailingFlowers";
echo "Session variables are set.";
?>
        <nav>
            <ul class="navigation">
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/browseItems.php">Browse Items</a></li>

                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/week3/viewCart.php">View Cart</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/checkout.php">Check Out</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/confirmation.php">Confirmation</a></li>
            </ul>
        </nav>


        <html>
<body>


You selected: <?php echo $_POST["continents"]; ?>
    <?php
if (isset($_SESSION['andes'])){
echo $_SESSION['andes']; // Displays value of checked checkbox.
    if (isset($_SESSION['bear'])){
echo $_SESSION['bear']; // Displays value of checked checkbox.
        if (isset($_SESSION['hearts'])){
echo $_SESSION['hearts']; // Displays value of checked checkbox.

}
?>

</body>
</html>



    </body>

    <script src="js/firstBtn.js"></script>


</html>
