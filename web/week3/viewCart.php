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

        <nav>
            <ul class="navigation">
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/browseItems.php">Browse Items</a></li>

                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/week3/viewCart.php">View Cart</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/checkout.php">Check Out</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/confirmation.php">Confirmation</a></li>
            </ul>
        </nav>


          <?php

        echo $andes;

        /*  if(empty($_SESSION['treat']))
        {
            $_SESSION['treat'] = array();
        }
        array_push($_SESSION['treat'], $_POST['name']);
        }

        var_dump($_SESSION)['treat']);

           if (isset($_SESSION["andes"])){
            echo "Andes Mint cupcakes"; // Displays value of checked checkbox.
            }
          if (isset($_SESSION["bear"])){
            echo "Bear cupcakes"; // Displays value of checked checkbox.
            }
             if (isset($_SESSION["hearts"])){
            echo "Heart cookies"; // Displays value of checked checkbox.
            }
            if (isset($_SESSION["lightbulb"])){
            echo "Lightbulb cookies"; // Displays value of checked checkbox.
            }
            if (isset($_SESSION["marbeling"])){
            echo "Marbeled wedding cake"; // Displays value of checked checkbox.
            }
            if (isset($_SESSION["monster"])){
            echo "Monster cupcakes"; // Displays value of checked checkbox.
            }
            if (isset($_SESSION["onsie"])){
            echo "Onsie cookies"; // Displays value of checked checkbox.
            }
            if (isset($_SESSION["paint"])){
            echo "Paint cookies"; // Displays value of checked checkbox.
            }
            if (isset($_SESSION["ruffles"])){
            echo "Wedding cake with ruffles"; // Displays value of checked checkbox.
            }
            if (isset($_SESSION["smores"])){
            echo "Smores cupcakes"; // Displays value of checked checkbox.
            }
            if (isset($_SESSION["topFlower"])){
            echo "Wedding cake with flowers on top"; // Displays value of checked checkbox.
            }
            if (isset($_SESSION["trailingFlowers"])){
            echo "Wedding cake with trailing flowers"; // Displays value of checked checkbox.
            }*/

            ?>


    </body>

    <script src=""></script>


</html>
