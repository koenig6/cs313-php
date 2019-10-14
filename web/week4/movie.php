<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Jody Koenig CS 313</title>
        <!-- external style references in the proper cascading order -->
        <link href="https://fonts.googleapis.com/css?family=Oswald|Slabo+27px" rel="stylesheet">
        <link href="css/normalize.css" rel="stylesheet"> <!-- normalize useragent/browser defaults -->
        <link href="cssMovie.css" rel="stylesheet">

    </head>
    <body>
        <header>
            <h1>Jody Koenig CS 313 </h1>
               <h2>Movie Database Page</h2>
        </header>

        <nav>
            <ul class="navigation">
                <li><a href="https://morning-bastion-33855.herokuapp.com/assignMain.php">Home Page</a></li>
                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/week4/movie.php">Movie Database</a></li>

            </ul>

        </nav>

        <main>

            <TITLE>Your Personal Movie Database</TITLE>

            <form action="movie.php" method="post">
                Movie Title: <input type="text" name="title"><br>
                Rating: <select name="rating"><br>
                        <option value="selectRegion" disabled>Select Rating</option>
                        <option value="g">G</option>
                        <option value="pg">PG</option>
                        <option value="pg-13">PG-13</option>
                        <option value="r">R</option>
                        <option value="nc-17">NC-17</option>
                    </select>



                Actors First Name: <input type="text" name="fname"><br>
                Actor's Last Name: <input type="text" name="lname"><br>
                Genre: <input type="text" name="genre"><br>
                Studio: <input type="text" name="studio"><br>


                <input type="submit">
            </form>

        </main>
        <script src="jsMovie.js"></script>
    </body>
</html>
