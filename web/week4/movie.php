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

            foreach ($db->query('SELECT * FROM movie')as $row) {
                echo $row['title'] . ' ';

            }

            ?>



            <form action='' method="post">
                Movie Title: <input type="text" name="title"><br>
                Rating: <select name="rating">
                        <option value="" disabled selected>Select Rating</option>
                        <option value="g">G</option>
                        <option value="pg">PG</option>
                        <option value="pg-13">PG-13</option>
                        <option value="r">R</option>
                        <option value="nc-17">NC-17</option>
                    </select><br>
                Actors First Name: <input type="text" name="fname"><br>
                Actor's Last Name: <input type="text" name="lname"><br>
                Genre: <input type="text" name="genre"><br>
                Studio: <input type="text" name="studio"><br>


                <input type="submit" value="Search">
            </form>

            <table>
                <tr><th>Results</th></tr>
                <tr><td>Book</td><td>Chapter</td><td>Verse</td><td>Content</td></tr>

                <?php


                    $title = filter_var($_POST["search"], FILTER_SANITIZE_STRING);
                   // $title = filter_var($_POST["search"], FILTER_SANITIZE_STRING);

         foreach ($db->query("SELECT * FROM movie WHERE title='".$title."'") as $row)
         {
            //echo "<a href=\"detail.php\">";
                echo $row['title'] . ' ';
                echo $row['rating'] . ' ';
                echo $row['fname'] . ' - "';
               // echo "</a>";
               // echo '<br>';
        }

                ?>
            </table>
        </main>
        <script src="jsMovie.js"></script>
    </body>
</html>
