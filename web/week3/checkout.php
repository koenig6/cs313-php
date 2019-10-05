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
        <link rel="stylesheet" href="/css/main.css">
        <title>Checkout</title>

    </head>
    <body>

        <nav>
            <ul class="navigation">
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/browseItems.php">Browse Items</a></li>

                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/viewCart.php">View Cart</a></li>
                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/week3/checkout.php">Check Out</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/confirmation.php">Confirmation</a></li>
            </ul>
        </nav>

        <form action="confirmation.php" method="post">
            First Name: <input type="text" name="firstName"><br>
            Last Name: <input type="text" name="lastName"><br>
            E-mail: <input type="text" name="email"><br>
            Street Address: <input type="text" name="street"><br>
            State: <input type="text" name="state"><br>
            Zip Code: <input type="text" name="zip"><br>

             <input type="submit">
        </form>


    </body>

    <script src="js/firstBtn.js"></script>


</html>
