<?php
// Start the session
session_start();
if(!empty($_GET["action"]))
{
    if($_GET["action"] == "remove")
    {
        if(!empty($_GET["item"]))
        {
            switch($_GET["item"])
            {
                case "andes":
                case "bear":
                case "smores":
                case "hearts":
                case "lightbulb":
                case "onsie":
                case "paint":
                case "ruffles":
                case "marbeling":
                case "topFlower":
                case "trailingFlowers":
                if(!empty($_SESSION[$_GET["item"]]))
                {
                    unset($_SESSION[$_GET["item"]]);
                }
                break;
            }//end switch
        }//end if
    }//end if

}//end if

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

        <nav>
            <ul class="navigation">
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/browseItems.php">Browse Items</a></li>

                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/week3/viewCart.php">View Cart</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/checkout.php">Check Out</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/confirmation.php">Confirmation</a></li>
            </ul>
        </nav>

        <?php

        if(!empty($_SESSION["andes"]))
        {
            echo "Andes Mint Cupcake: ";
            echo $_SESSION["andes"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=andes">Remove</a>
        <?php
        }

        ?>


    </body>
</html>
