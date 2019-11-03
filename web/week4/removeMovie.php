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
               <h2>Movie Database Removal Page</h2>
        </header>

        <nav>
            <ul class="navigation">
                <li><a href="https://morning-bastion-33855.herokuapp.com/assignMain.php">Assignment Page</a></li>
                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/week4/movie.php">Movie Database</a></li>

                 <li><a href="https://morning-bastion-33855.herokuapp.com/week4/addMovie.php">Add Movie</a></li>
            </ul>
        </nav>

        <main>

            <div>
                <?php
                if(!empty($_GET['movieIdent']))
                {


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

            //********THIS IS FOR DELETING MOVIE TO ACTOR*****
            $queryMA = 'DELETE FROM movietoactor WHERE movieid = :movieID';
            //prepare query to go to the database
            $stmt = $db->prepare($queryMA);
            $stmt->bindValue(':movieID', urldecode(strtolower($_GET["movieIdent"])), PDO::PARAM_STR);
            //sends query to database and returns results
            $stmt->execute();

             //********THIS IS FOR DELETING MOVIE*****
            $queryM = 'DELETE FROM movie WHERE movieid = :movieID';
            //prepare query to go to the database
            $stmtM = $db->prepare($queryM);
            $stmtM->bindValue(':movieID', urldecode(strtolower($_GET["movieIdent"])), PDO::PARAM_STR);
            //sends query to database and returns results
            $stmtM->execute();

               echo "Movie successfully deleted!<br>";

            }//end try
            catch (PDOException $ex)
            {
                echo 'Error!: ' . $ex->getMessage();
                die();
            }
                }//end of if!empty statement
                else
                {
                   echo 'Could not delete.  Movie not found.';

                }
                   ?>
            </div>
        </main>
    </body>
</html>
