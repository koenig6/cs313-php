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
        <title>Checkout</title>

    </head>
    <body>

        <nav id="shop">
            <ul class="navigation">
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/browseItems.php">Browse Items</a></li>

                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/viewCart.php">View Cart</a></li>
                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/week3/checkout.php">Check Out</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/confirmation.php">Confirmation</a></li>
            </ul>
        </nav>



        <div id="cart">
            <form action="confirmation.php" method="post">
                First Name: <input type="text" name="firstName" pattern="[A-Za-z]"><br><br>
                Last Name: <input type="text" name="lastName" pattern="[A-Za-z]"><br><br>
                E-mail: <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br><br>
                Street Address: <input type="text" name="street" pattern="[A-Za-z0-9]"><br><br>
                City: <input type="text" name="city" pattern="[A-Za-z]"><br><br>
                State: <input type="text" name="state" pattern="[A-Za-z]"><br><br>
                Zip Code: <input type="text" name="zip" pattern="[0-9]{5}"><br><br><br>

                 <input type="submit" name="Submit Your Order">
            </form>
        </div>

    </body>
</html>
