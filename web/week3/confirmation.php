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
        <title>Confirmation</title>

    </head>
    <body>

        <nav>
            <ul class="navigation">
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/browseItems.php">Browse Items</a></li>

                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/viewCart.php">View Cart</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/checkout.php">Check Out</a></li>
                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/week3/confirmation.php">Confirmation</a></li>
            </ul>
        </nav>

            Thank your for your purchase <?php echo $_POST["firstName"]; ?>
            Your delivery will be to: <br><?php echo $_POST["firstName"]; echo " "; echo $_POST["lastName"]; ?><br>
                                        <?php echo $_POST["email"]; ?><br>
                                        <?php echo $_POST["street"]; echo " ";
                                        echo $_POST["state"];echo " ";echo $_POST["zip"];?><br>

        <?php
        if(!empty($_SESSION["andes"]))
        {
            echo "Andes Mint Cupcakes: ";
            echo $_SESSION["andes"] . " ";
            echo "<br>"
        ?>

        <?php
        }

        if(!empty($_SESSION["bear"]))
        {
            echo "Bear Cupcakes: ";
            echo $_SESSION["bear"] . " \n";
        ?>

        <?php
        }

        if(!empty($_SESSION["smores"]))
        {
            echo "Smores Cupcakes: ";
            echo $_SESSION["smores"] . " ";
        ?>
            <br>
        <?php
        }

        if(!empty($_SESSION["monster"]))
        {
            echo "Monster Cupcakes: ";
            echo $_SESSION["monster"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=monster">Remove</a><br>
        <?php
        }

        if(!empty($_SESSION["hearts"]))
        {
            echo "Heart Cookies: ";
            echo $_SESSION["hearts"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=hearts">Remove</a><br>
        <?php
        }

        if(!empty($_SESSION["lightbulb"]))
        {
            echo "Lightbulb Cookies: ";
            echo $_SESSION["lightbulb"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=lightbulb">Remove</a><br>
        <?php
        }

        if(!empty($_SESSION["onsie"]))
        {
            echo "Baby Onsie Cookies: ";
            echo $_SESSION["onsie"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=onsie">Remove</a><br>
        <?php
        }

        if(!empty($_SESSION["paint"]))
        {
            echo "Paint Pallette Cookies: ";
            echo $_SESSION["paint"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=paint">Remove</a><br>
        <?php
        }

        if(!empty($_SESSION["ruffles"]))
        {
            echo "Wedding Cake with Ruffles: ";
            echo $_SESSION["ruffles"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=ruffles">Remove</a><br>
        <?php
        }

        if(!empty($_SESSION["marbeling"]))
        {
            echo "Wdding Cake with Marbeling: ";
            echo $_SESSION["marbeling"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=marbeling">Remove</a><br>
        <?php
        }

        if(!empty($_SESSION["topFlower"]))
        {
            echo "Wedding Cake with Flower on Top: ";
            echo $_SESSION["topFlower"] . " \n";
        ?>
            <a href="viewCart.php?action=delete&item=topFlower">Remove</a><br>
        <?php
        }

        if(!empty($_SESSION["trailingFlowers"]))
        {
            echo "Wedding Cake with Trailing Flowers: ";
            echo $_SESSION["trailingFlowers"] . " \n";
        ?>
            <br>
        <?php
        }

        ?>









    </body>
</html>
