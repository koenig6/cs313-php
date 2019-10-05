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
        <link rel="stylesheet" href="/css/main1.css">
        <title>Confirmation</title>

    </head>
    <body>

        <nav id="shop">
            <ul class="navigation">
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/browseItems.php">Browse Items</a></li>

                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/viewCart.php">View Cart</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/checkout.php">Check Out</a></li>
                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/week3/confirmation.php">Confirmation</a></li>
            </ul>
        </nav>

        <div id="cart">
                Thank you for your purchase <?php echo $_POST["firstName"]; ?><br><br>

                Your delivery will be to: <br>
                <?php echo $_POST["firstName"] . " " . $_POST["lastName"]; ?><br>

                <?php echo $_POST["email"]; ?><br>
                <?php echo $_POST["street"] . " ";?><br>
                <?php echo $_POST["city"] . ", " . $_POST["state"] . " " . $_POST["zip"];?><br><br>

            <?php
            if(!empty($_SESSION["andes"]))
            {
                echo "Andes Mint Cupcakes: ";
                echo $_SESSION["andes"] . " ";
                echo "<br>";
            }

            if(!empty($_SESSION["bear"]))
            {
                echo "Bear Cupcakes: ";
                echo $_SESSION["bear"] . " ";
                echo "<br>";
            }

            if(!empty($_SESSION["smores"]))
            {
                echo "Smores Cupcakes: ";
                echo $_SESSION["smores"] . " ";
                echo "<br>";
            }

            if(!empty($_SESSION["monster"]))
            {
                echo "Monster Cupcakes: ";
                echo $_SESSION["monster"] . " ";
                echo "<br>";
            }

            if(!empty($_SESSION["hearts"]))
            {
                echo "Heart Cookies: ";
                echo $_SESSION["hearts"] . " ";
                echo "<br>";
            }

            if(!empty($_SESSION["lightbulb"]))
            {
                echo "Lightbulb Cookies: ";
                echo $_SESSION["lightbulb"] . " ";
                echo "<br>";
            }

            if(!empty($_SESSION["onsie"]))
            {
                echo "Baby Onsie Cookies: ";
                echo $_SESSION["onsie"] . " ";
                echo "<br>";
            }

            if(!empty($_SESSION["paint"]))
            {
                echo "Paint Pallette Cookies: ";
                echo $_SESSION["paint"] . " ";
                echo "<br>";
            }

            if(!empty($_SESSION["ruffles"]))
            {
                echo "Wedding Cake with Ruffles: ";
                echo $_SESSION["ruffles"] . " ";
                echo "<br>";
            }

            if(!empty($_SESSION["marbeling"]))
            {
                echo "Wdding Cake with Marbeling: ";
                echo $_SESSION["marbeling"] . " ";
                echo "<br>";
            }

            if(!empty($_SESSION["topFlower"]))
            {
                echo "Wedding Cake with Flower on Top: ";
                echo $_SESSION["topFlower"] . " ";
                echo "<br>";
            }

            if(!empty($_SESSION["trailingFlowers"]))
            {
                echo "Wedding Cake with Trailing Flowers: ";
                echo $_SESSION["trailingFlowers"] . " ";
                echo "<br>";
            }
            ?>
        </div>
    </body>
</html>
