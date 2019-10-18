<?php
// Start the session
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
             <?php
            try
            {
                $dbUrl = getenv('DATABASE_URL');
                $dbOpts = parse_url($dbUrl);
                $dbHost = $dbOpts["host"];
                $dbPort = $dbOpts["port"];
                $dbUser = $dbOpts["user"];
                $dbPassword = $dbOpts["pass"];
                $dbName = ltrim($dbOpts["path"],'/');

                $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $ex)
            {
                echo 'Error!: ' . $ex->getMessage();
                die();
            }
            ?>

            <form action="https://morning-bastion-33855.herokuapp.com/week4/movieResults.php" method="post">
                Movie Title: <input type="text" name="title"><br><br>
                Actors First Name: <input type="text" name="fname"><br>
                Actor's Last Name: <input type="text" name="lname"><br><br>
                Studio: <input type="text" name="studio"><br><br>
                Genre: <select name="genre">
                        <option value="" disabled selected>Select Rating</option>
                        <option value="adventure">adventure</option>
                        <option value="comedy">comedy</option>
                        <option value="crime">crime</option>
                        <option value="docudrama">docudrama</option>
                        <option value="drama">drama</option>
                        <option value="fantasy">fantasy</option>
                        <option value="historical">historical</option>
                        <option value="historical fiction">historical fiction</option>
                        <option value="horror">horror</option>
                        <option value="mystery">mystery</option>
                        <option value="romance">romance</option>
                        <option value="science fiction">science fiction</option>
                    </select><br><br>
                Rating: <select name="rating">
                        <option value="" disabled selected>Select Rating</option>
                        <option value="g">G</option>
                        <option value="pg">PG</option>
                        <option value="pg-13">PG-13</option>
                        <option value="r">R</option>
                        <option value="nc-17">NC-17</option>
                    </select><br><br>

                <input type="submit" value="Search" ><br><br>
            </form>

            <table>
                <tr><th>Results</th></tr>
                <tr><td>Movie</td><td>Actor's Name</td><td>Rating</td><td>Studio</td></tr>

                <?php

                $query = 'SELECT * FROM movie';

                    foreach ($db->query($query)as $row) {
                        echo $row['title'] . ', <br>';

            }
                ?>
            </table>
        </main>
        <script src="jsMovie.js"></script>
    </body>
</html>
