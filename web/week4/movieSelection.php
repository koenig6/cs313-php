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
               <h2>Movie Database Details</h2>
        </header>

    <nav>
            <ul class="navigation">

                <li><a href="https://morning-bastion-33855.herokuapp.com/week4/movie.php">New Search</a></li>

            </ul>
        </nav>
    <main>
         <?php
        if(!empty($_GET["title"]))
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


            }//end try
            catch (PDOException $ex)
            {
                echo 'Error!: ' . $ex->getMessage();
                die();
            }

            //prepare query to go to the database
            $stmt = $db->prepare($query);
            $actorStmt = $db->prepare($actorQuery);


            $stmt->bindValue(':title', urldecode(strtolower($_GET["title"])), PDO::PARAM_STR);
            $actorStmt->bindValue(':title', urldecode(strtolower($_GET["title"])), PDO::PARAM_STR);

            //sends query to database and returns results
            $stmt->execute();
            $actorStmt->execute();


            //displays info from database
            foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            {
             echo '<div class="grid-item">' . $row['movie_title'] . '<br>' . $row['movie_year'] .  '<br>' . $row['rating'] . ', ' . $row['genre'] . ' ' . $row['studio'] . '<br><br>' .$row['movie_desc'] . '<br><br></div>';
            }


            echo '<div class="grid-item">' . 'Actors<br>';
           foreach($actorStmt->fetchAll(PDO::FETCH_ASSOC) as $actorRow)
            {
            echo  $actorRow['fname'] . ' ' . $actorRow['lname']. '<br>';
            }
            echo '</div>';


        }//end of if statement
             ?>

</main>
</body>
</html>
