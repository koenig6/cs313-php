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
    <nav>
            <ul class="navigation">
                <li><a href="https://morning-bastion-33855.herokuapp.com/week4/movie.php">Back</a></li>

            </ul>
        </nav>
    <main>
         <?php
        if(!empty($_GET["title"]))
        {
            echo "hi Douglas!";/////////////////////////////
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


                $query = 'SELECT
                    m.title as movie_title,
                    m.year as movie_year,
                    m.description as movie_desc,
                    g.genrename as genre,
                    r.rating as rating,
                    s.studioname as studio
                FROM
                    movie as m
                    left join studio as s on m.studioid = s.studioid
                    left join genre as g on m.genreid = g.genreid
                    left join rating as r on m.ratingid = r.ratingid

                WHERE
                    1=1
                    AND m.title=:title';




            }//end try
            catch (PDOException $ex)
            {
                echo 'Error!: ' . $ex->getMessage();
                die();
            }
            echo "Position number 1";///////////////////
            //prepare query to go to the database
            $stmt = $db->prepare($query);



            $stmt->bindValue(':title', urldecode(strtolower($_GET["title"])), PDO::PARAM_STR);



            echo "Position number 2";///////////////////
            //sends query to database and returns results
            $stmt->execute();


            echo "Position number 3";///////////////////
            foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            {
             echo $row['movie_title'] . ', ' . $row['movie_year'] .  ', ' . $row['rating'] . ', ' . $row['genre'] . ', ' . $row['studio'] . ', ' .$row['movie_desc'] . '<br>';
            }

            $dbActor = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
                $dbActor->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

             $actorQuery= 'SELECT
                    a.actorsfirstname as fname,
                    a.actorslastname as lname
                FROM
                    movie as m
                    left join movietoactor as ma on m.movieid = ma.movieid
                    left join actors as a on ma.actorsid = a.actorsid
                WHERE
                    1=1
                    AND m.title=:title';

            $actorStmt = $dbActor->prepare($actorQuery);
            echo "Position number 3.1";///////////////////
            $actorStmt->bindValue(':title', urldecode(strtolower($_GET["title"])), PDO::PARAM_STR);
            echo "Position number 3.2";///////////////////
            $actorStmt->execute();

            echo "Position number 4";///////////////////
           foreach($actorStmt->fetchAll(PDO::FETCH_ASSOC) as $actorRow)
            {
            echo $actorRow['fname'] . ' ' . $actorRow['lname']. '<br>';
            }
            echo "Position number 5";///////////////////

        }//end of if statement
             ?>

</main>
</body>
</html>
