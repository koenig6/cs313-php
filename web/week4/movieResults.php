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
               <h2>Movie Database Results Page</h2>
        </header>

        <nav>
            <ul class="navigation">
                <li><a href="https://morning-bastion-33855.herokuapp.com/week4/movie.php">New Search</a></li>
                 <li><a href="https://morning-bastion-33855.herokuapp.com/week4/addMovie.php">Add Movie</a></li>

            </ul>
        </nav>
        <main>
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


            $query = 'SELECT
    m.movieid as movie_id,
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
	left join movietoactor as ma on m.movieid = ma.movieid
	left join actors as a on ma.actorsid = a.actorsid
WHERE
    1=1';

            }//end try
            catch (PDOException $ex)
            {
                echo 'Error!: ' . $ex->getMessage();
                die();
            }

           if(!empty($_POST["title"]))
            {
               $query = $query . ' AND m.title=:title';
            }

            if(!empty($_POST["fname"]))
            {
               $query = $query . ' AND a.actorsfirstname=:fname';
            }
            if(!empty($_POST["lname"]))
            {
               $query = $query . ' AND a.actorslastname=:lname';
            }
            if(!empty($_POST["lname"]))
            {
               $query = $query . ' AND a.actorslastname=:lname';
            }
            if(!empty($_POST["rating"]))
            {
               $query = $query . ' AND r.rating=:rating';
            }
            if(!empty($_POST["genre"]))
            {
               $query = $query . ' AND g.genrename=:genre';
            }
            if(!empty($_POST["studio"]))
            {
               $query = $query . ' AND s.studioname=:studio';
            }

            // removed dublicates since actors and movies can have mutliples of each
            $query = $query . ' GROUP BY m.movieid, m.title, m.year, m.description, g.genrename, r.rating, s.studioname';

            $stmt = $db->prepare($query);
            if(!empty($_POST["title"]))
            {
                $stmt->bindValue(':title', strtolower($_POST["title"]), PDO::PARAM_STR);
            }
            if(!empty($_POST["fname"]))
            {
                $stmt->bindValue(':fname', strtolower($_POST["fname"]), PDO::PARAM_STR);
            }
            if(!empty($_POST["lname"]))
            {
                $stmt->bindValue(':lname', strtolower($_POST["lname"]), PDO::PARAM_STR);
            }
            if(!empty($_POST["rating"]))
            {
                $stmt->bindValue(':rating', strtolower($_POST["rating"]), PDO::PARAM_STR);
            }
            if(!empty($_POST["genre"]))
            {
                $stmt->bindValue(':genre', strtolower($_POST["genre"]), PDO::PARAM_STR);
            }
            if(!empty($_POST["studio"]))
            {
                $stmt->bindValue(':studio', strtolower($_POST["studio"]), PDO::PARAM_STR);
            }


            //sends query to database and returns results
            $stmt->execute();


            foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
                    echo '<div class="grid-item">' . $row['movie_title'] . ' - ' . $row['movie_year'] . '<br>
                <a href="movieSelection.php?movieId=' . urlencode($row['movie_id']) . '">Select</a><br>'  . '<br><br></div>';
            }//foreach loop
            ?>

        </main>
    </body>
</html>
