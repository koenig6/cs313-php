<?php
// Start the session
session_start();
if(!empty($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        if(!empty($_GET["item"]))
        {
            switch($_GET["item"])
            {
                case "andes":
                case "bear":
                case "smores":
                case "monster":
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
            echo "Andes Mint Cupcakes: ";
            echo $_SESSION["andes"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=andes">Remove</a><br>
        <?php
        }

        if(!empty($_SESSION["bear"]))
        {
            echo "Bear Cupcakes: ";
            echo $_SESSION["bear"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=bear">Remove</a><br>
        <?php
        }

        if(!empty($_SESSION["smores"]))
        {
            echo "Smores Cupcakes: ";
            echo $_SESSION["smores"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=smores">Remove</a><br>
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
            echo "Wedding Cake with Marbeling: ";
            echo $_SESSION["marbeling"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=marbeling">Remove</a><br>
        <?php
        }

        if(!empty($_SESSION["topFlower"]))
        {
            echo "Wedding Cake with Flower on Top: ";
            echo $_SESSION["topFlower"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=topFlower">Remove</a><br>
        <?php
        }

        if(!empty($_SESSION["trailingFlowers"]))
        {
            echo "Wedding Cake with Trailing Flowers: ";
            echo $_SESSION["trailingFlowers"] . " ";
        ?>
            <a href="viewCart.php?action=delete&item=trailingFlowers">Remove</a><br>
        <?php
        }

        ?>


    </body>
</html>
