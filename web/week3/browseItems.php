<?php
// Start the session
session_start();

if(!empty($_GET["action"]))
{
    if($_GET["action"] == "add")
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
                    if(empty($_SESSION[$_GET["item"]]))
                    {
                        //first time clicking this item
                        $_SESSION[$_GET["item"]] = 1;
                    }
                    else
                    {
                        //second or later time clicking this item
                        $_SESSION[$_GET["item"]] += 1;
                    }
                    echo $_GET["item"];
                    echo $_SESSION[$_GET["item"]];
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
        <link rel="stylesheet" href="/css/main.css">
        <title>Shopping Cart</title>

    </head>
    <body>
        <nav>
            <ul class="navigation">
                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/week3/browseItems.php">Browse Items</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/viewCart.php">View Cart</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/checkout.php">Check Out</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week3/confirmation.php">Confirmation</a></li>
            </ul>
        </nav>



        <table>
                <tbody>
                    <tr>

                        <form method="post" action="browseItems.php?action=add&item=andes">
                           <td><img src="img/andes.jpg" alt="cupcake" width="133" height="168"> </td>
                            <td>Andes Mint cupcakes</td>
                            <td><button type="submit" name="andes">Add to cart</button></td>
                        </form>

                    </tr>
                    <tr>

                        <form method="post" action="browseItems.php?action=add&item=bear">
                           <td><img src="img/bear.jpg" alt="cupcake" width="120" height="160"> </td>
                            <td>Bear cupcakes</td>
                            <td><button type="submit" name="bear">Add to cart</button></td>
                        </form>

                    </tr>
                    <tr>

                        <form method="post" action="browseItems.php?action=add&item=smores">
                       <td><img src="img/smores.jpg" alt="cupcake" width="108" height="90"> </td>
                        <td>Smores cupcakes</td>
                        <td><button type="submit" name="smores">Add to cart</button></td>
                            </form>

                    </tr>
                    <tr>

                        <form method="post" action="browseItems.php?action=add&item=monster">
                       <td><img src="img/monster.jpg" alt="cupcake" width="102" height="73"> </td>
                        <td>Monster cupcakes</td>
                        <td><button type="submit" name="monster">Add to cart</button></td>
                            </form>

                    </tr>
                     <tr>

                         <form method="post" action="browseItems.php?action=add&item=hearts">
                       <td><img src="img/hearts.jpg" alt="cupcake" width="160" height="120"> </td>
                        <td>Heart cookies</td>
                         <td><button type="submit" name="hearts">Add to cart</button></td>
                             </form>

                    </tr>
                     <tr>

                         <form method="post" action="browseItems.php?action=add&item=lightbulb">
                       <td><img src="img/lightbulb.jpg" alt="cupcake" width="128" height="102"> </td>
                        <td>Lightbulb cookies</td>
                         <td><button type="submit" name="lightbulb">Add to cart</button></td>
                             </form>
                    </tr>
                     <tr>

                         <form method="post" action="browseItems.php?action=add&item=onsie">
                       <td><img src="img/onsie.jpg" alt="cupcake" width="144" height="91"> </td>
                        <td>Baby onsie cookies</td>
                         <td><button type="submit" name="onsie">Add to cart</button></td>
                             </form>
                    </tr>
                     <tr>

                         <form method="post" action="browseItems.php?action=add&item=paint">
                       <td><img src="img/paint.jpg" alt="cupcake" width="100" height="75"> </td>
                        <td>Paint pallette cookies</td>
                         <td><button type="submit" name="paint">Add to cart</button></td>
                             </form>
                    </tr>
                     <tr>

                         <form method="post" action="browseItems.php?action=add&item=ruffles">
                       <td><img src="img/ruffles.jpg" alt="cupcake" width="107" height="146"> </td>
                        <td>Wedding cake with ruffles</td>
                         <td><button type="submit" name="ruffles">Add to cart</button></td>
                             </form>
                    </tr>
                     <tr>

                         <form method="post" action="browseItems.php?action=add&item=marbeling">
                       <td><img src="img/marbeling.jpg" alt="cupcake" width="129" height="170"> </td>
                        <td>Wedding cake with marbeling</td>
                         <td><button type="submit" name="marbeling">Add to cart</button></td>
                             </form>
                    </tr>
                     <tr>

                         <form method="post" action="browseItems.php?action=add&item=topFlower">
                       <td><img src="img/topFlower.jpg" alt="cupcake" width="118" height="177"> </td>
                        <td>Wedding cake with flower on top</td>
                         <td><button type="submit" name="topFlower">Add to cart</button></td>
                             </form>
                    </tr>
                     <tr>

                         <form method="post" action="browseItems.php?action=add&item=trailingFlowers">
                       <td><img src="img/trailingFlowers.jpg" alt="cupcake" width="91" height="122"> </td>
                        <td>Wedding cake with trailing flowers</td>
                         <td><button type="submit" name="trailingFlowers">Add to cart</button></td>
                             </form>
                    </tr>

               </tbody>
            </table>


    </body>
</html>
