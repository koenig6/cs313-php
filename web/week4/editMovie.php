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
               <h2>Edit Movie In Database</h2>
        </header>

        <nav>
            <ul class="navigation">
                <li><a href="https://morning-bastion-33855.herokuapp.com/assignMain.php">Home Page</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week4/movie.php">Movie Database</a></li>
                <li  class="active"><a href="https://morning-bastion-33855.herokuapp.com/week4/editMovie.php">Edit Movie</a></li>
                 <li><a href="https://morning-bastion-33855.herokuapp.com/week4/addMovie.php">Add Movie</a></li>
            </ul>
        </nav>

        <main>
            <?php

                if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnSubmit']))
                {
                    //Do modify in database
                }//end if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnSubmit']))
                else
                {
                    //Display form with the current movie data
                    try
                    {

                        print_r($_POST);
                        echo "<br>";


                        //connecting to database
                        $dbUrl = getenv('DATABASE_URL');
                        $dbOpts = parse_url($dbUrl);
                        $dbHost = $dbOpts["host"];
                        $dbPort = $dbOpts["port"];
                        $dbUser = $dbOpts["user"];
                        $dbPassword = $dbOpts["pass"];
                        $dbName = ltrim($dbOpts["path"],'/');

                        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                        $query = "SELECT
                                m.title as movie_title,
                                m.year as movie_year,
                                m.description as movie_desc,
                                g.genrename as genre,
                                r.rating as rating,
                                s.studioname as studio
                            FROM
                                movie as m

                                left join movie as y on m.year = y.year
                                left join movie as d on m.description = d.description
                                left join studio as s on m.studioid = s.studioid
                                left join genre as g on m.genreid = g.genreid
                                left join rating as r on m.ratingid = r.ratingid

                            WHERE
                                1=1
                                AND m.movieid=:movieIDENT";


                        $actorQuery= "SELECT
                                a.actorslastname || ', ' || a.actorsfirstname as actorname
                            FROM
                                movie as m
                                left join movietoactor as ma on m.movieid = ma.movieid
                                left join actors as a on ma.actorsid = a.actorsid
                            WHERE
                                1=1
                                AND m.movieid=:movieIDENT";



                        //prepare query to go to the database
                        $stmt = $db->prepare($query);
                        $actorStmt = $db->prepare($actorQuery);


                        $stmt->bindValue(':movieIDENT', urldecode(strtolower($_GET["movieIdent"])), PDO::PARAM_STR);
                        $actorStmt->bindValue(':movieIDENT', urldecode(strtolower($_GET["movieIdent"])), PDO::PARAM_STR);

                        //sends query to database and returns results
                        $stmt->execute();
                        $actorStmt->execute();

                        $stmtRowSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $actorRowSet = $actorStmt->fetchAll(PDO::FETCH_ASSOC);

                        print_r($stmtRowSet);
                        echo "<br>"
                        print_r($actorRowSet);
                        echo "<br>"

                    }//end try
                    catch (PDOException $ex)
                    {
                        echo 'Error!: ' . $ex->getMessage();
                        die();
                    }
                    catch (Exception $ex)
                    {
                        echo 'Error!: ' . $ex->getMessage();
                        die();
                    }


                }//end else

            ?>


            <div>
                <form action="https://morning-bastion-33855.herokuapp.com/week4/addMovie.php" method="post">
                    <input type="hidden" name="movieIdent" value="<?php echo $_GET["movieIdent"]?>">
                    Movie Title: <input type="text" name="title" value="<?php echo $stmtRowSet[0]["movie_title"]?>"><br><br>
                    Year: <input type="text" name="year"><br><br>

                     <textarea rows="20" cols="55" id="div2" name="description">Add your movie description here.</textarea><br>
                    Studio: <input type="text" name="studio"><br><br>
                    Genre: <select name="genre">
                            <option value="" disabled selected>Select Genre</option>
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



                    Actor's First Name: <input type="text" id="fname"/><br><br>
                    Actor's Last Name: <input type="text" id="lname"/><br><br>
                    <button type="button" onclick="addItem()">Add Actor To List</button>
                    <button type="button" onclick="removeItem()">Remove Actor From List</button>

                    <ul id="myList"></ul>

                    <input type="submit" value="Add Movie" name="btnSubmit" ><br><br>
                </form>




            </div>
        </main>
        <script src="/js/editMovie.js"></script>
    </body>
</html>
