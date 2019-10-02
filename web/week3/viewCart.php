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
        $_SESSION["treat"] = "bear";
        $_SESSION["treat"] = "hearts";
        $_SESSION["treat"] = "lightbulb";
        $_SESSION["treat"] = "marbeling";
        $_SESSION["treat"] = "monster";
        $_SESSION["treat"] = "onsie";
        $_SESSION["treat"] = "paint";
        $_SESSION["treat"] = "ruffles";
        $_SESSION["treat"] = "smores";
        $_SESSION["treat"] = "topFlower";
        $_SESSION["treat"] = "trailingFlowers";
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
if (isset($_POST['treat'])){
echo $_POST['treat']; // Displays value of checked checkbox.
}
?>

</body>
</html>



    </body>

    <script src="js/firstBtn.js"></script>


</html>
