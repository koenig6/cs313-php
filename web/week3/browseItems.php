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
?>
        <nav>
            <ul class="navigation">
                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/week3/browseItems.php">Browse Items</a></li>

                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/viewCart.php">View Cart</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/checkout.php">Check Out</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/confirmation.php">Confirmation</a></li>
            </ul>
        </nav>

        <table>
               <thead>
                   <tr>
                       <th></th>
                   </tr>
               </thead>
                <tbody>
                    <tr>
                         <td><input type="checkbox" name="food" value="andes"></td>
                       <td><img src="img/andes.jpg" alt="cupcake" width="133" height="168"> </td>
                        <td>Andes Mint cupcakes</td>
                        <td><button type="button" name="andes">Add to cart</button></td>

                    </tr>
                    <tr>
                       <td><input type="checkbox" name="food" value="bear"></td>
                       <td><img src="img/bear.jpg" alt="cupcake" width="120" height="160"> </td>
                        <td>Bear cupcakes</td>

                    </tr>
                    <tr>
                        <td><input type="checkbox" name="food" value="smores"></td>
                       <td><img src="img/smores.jpg" alt="cupcake" width="108" height="90"> </td>
                        <td>Smores cupcakes</td>

                    </tr>
                    <tr>
                        <td><input type="checkbox" name="food" value="monster"></td>
                       <td><img src="img/monster.jpg" alt="cupcake" width="102" height="73"> </td>
                        <td>Monster cupcakes</td>

                    </tr>
                     <tr>
                         <td><input type="checkbox" name="food" value="hearts"></td>
                       <td><img src="img/hearts.jpg" alt="cupcake" width="160" height="120"> </td>
                        <td>Heart cookies</td>

                    </tr>
                     <tr>
                        <td><input type="checkbox" name="food" value="lightbult"></td>
                       <td><img src="img/lightbulb.jpg" alt="cupcake" width="128" height="102"> </td>
                        <td>Lightbulb cookies</td>
                    </tr>
                     <tr>
                       <td><input type="checkbox" name="food" value="onsie"></td>
                       <td><img src="img/onsie.jpg" alt="cupcake" width="144" height="91"> </td>
                        <td>Baby onsie cookies</td>
                    </tr>
                     <tr>
                      <td><input type="checkbox" name="food" value="paint"></td>
                       <td><img src="img/paint.jpg" alt="cupcake" width="100" height="75"> </td>
                        <td>Paint pallette cookies</td>
                    </tr>
                     <tr>
                       <td><input type="checkbox" name="food" value="ruffles"></td>
                       <td><img src="img/ruffles.jpg" alt="cupcake" width="107" height="146"> </td>
                        <td>Wedding cake with ruffles</td>
                    </tr>
                     <tr>
                        <td><input type="checkbox" name="food" value="marbeling"></td>
                       <td><img src="img/marbeling.jpg" alt="cupcake" width="129" height="170"> </td>
                        <td>Wedding cake with marbeling</td>
                    </tr>
                     <tr>
                       <td><input type="checkbox" name="food" value="topFlower"></td>
                       <td><img src="img/topFlower.jpg" alt="cupcake" width="118" height="177"> </td>
                        <td>Wedding cake with flower on top</td>
                    </tr>
                     <tr>
                       <td><input type="checkbox" name="food" value="trailingFlowers"></td>
                       <td><img src="img/trailingFlowers.jpg" alt="cupcake" width="91" height="122"> </td>
                        <td>Wedding cake with trailing flowers</td>
                    </tr>

               </tbody>
            </table>


    </body>

    <script src="js/firstBtn.js"></script>


</html>
