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
                 <li><a href="https://morning-bastion-33855.herokuapp.com/week4/addMovie.php">Add Movie</a></li>
            </ul>
        </nav>

        <main>
            <?php

                if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnSubmit']))
                {
                    //Do modify in database
                    print_r($_POST);
                    echo "<br>";
                    try
                    {
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

                        //********ADDING ACTORS TO THE DATABASE************************
                        //fetch the actor array. Each item in the array will be "last_name, first_name"
                        $actors = $_POST["actors"];
                        $actorids = array();
                        $actorCount = 0;

                        foreach($actors as $actor)
                        {
                            //break the string apart using strtok. This will return everything before the next comma for
                            //the string passed in on the first call. Each next call will return everything after the last
                            //comma but before the next comma until there is nothing left in the string.
                            $LastName = rtrim(ltrim(strtok($actor, ",")));
                            $FirstName = rtrim(ltrim(strtok(",")));

                            echo "<br>" . $FirstName . " + " . $LastName . "<br>";

                            if($FirstName === "" || $LastName === "")
                            {
                                throw new Exception("Actor's mama gave them a full name, please enter it.");
                            }


                            $queryActors = 'SELECT actorsid FROM actors WHERE actorsfirstname = :firstname AND actorslastname = :lastname LIMIT 1';
                            $stmtActors = $db->prepare($queryActors);
                            $stmtActors->bindValue(':firstname', strtolower($FirstName), PDO::PARAM_STR);
                            $stmtActors->bindValue(':lastname', strtolower($LastName), PDO::PARAM_STR);
                            $stmtActors->execute();

                            $actorRowSet = $stmtActors->fetchAll(PDO::FETCH_ASSOC);

                            echo $actorRowSet . "<br>";

                            echo "Find Actor <br>";
                            print_r($actorRowSet);
                            echo $actorRowSet[0]["actorsid"];

                            if(!empty($actorRowSet))
                            {
                                $actorids[$actorCount] = $actorRowSet[0]["actorsid"];
                            }
                            else
                            {

                                echo "Entered Insert Actor<br>";
                                $queryActors = 'INSERT INTO actors (actorsfirstname, actorslastname) VALUES(:firstname, :lastname) RETURNING actorsid';
                                $stmtActors = $db->prepare($queryActors);
                                $stmtActors->bindValue(':firstname', strtolower($FirstName), PDO::PARAM_STR);
                                $stmtActors->bindValue(':lastname', strtolower($LastName), PDO::PARAM_STR);
                                $stmtActors->execute();

                                $actorRowSet = $stmtActors->fetchAll(PDO::FETCH_ASSOC);

                                echo "Add Actor <br>";
                                print_r($actorRowSet);
                                echo $actorRowSet[0]["actorsid"];

                                if(!empty($actorRowSet))
                                {
                                    $actorids[$actorCount] = $actorRowSet[0]["actorsid"];
                                }
                                else
                                {
                                    throw new Exception("Could not insert actor " . $FirstName . " "  . $LastName);
                                }
                            }


                            echo "Actor: " . $actorids[$actorCount] . "<br>";
                            $actorCount = $actorCount + 1;
                        }

                        foreach($actorids as $actorid)
                        {
                            echo "Actorid: " . $actorid . "<br>";
                        }

                        //**********check that year is a number
                        if(!is_numeric($_POST[year]))
                        {
                            throw new Exception("Year has to be a number");
                        }

                        //********THIS IS FOR ADDING A GENRE TO A MOVIE *****
                        $queryGenre = 'SELECT genreid FROM genre WHERE genrename = :genreid LIMIT 1';
                        //prepare query to go to the database
                        $stmtGenre = $db->prepare($queryGenre);
                        $stmtGenre->bindValue(':genreid', urldecode(strtolower($_POST["genre"])), PDO::PARAM_STR);
                        //sends query to database and returns results
                        $stmtGenre->execute();

                        $genreRowSet = $stmtGenre->fetchAll(PDO::FETCH_ASSOC);
                        print_r($genreRowSet);
                        echo $genreRowSet[0]["genreid"];

                        $genreid = -1;
                        if(!empty($genreRowSet))
                        {
                            $genreid = $genreRowSet[0]["genreid"];
                        }
                        else
                        {
                            throw new Exception("Please select a valid genre.");
                        }

                        echo $genreid . '<br>';

                        //********THIS IS FOR ADDING A RATING TO A MOVIE*****
                        $queryRating = 'SELECT ratingid FROM rating WHERE rating = :ratingid LIMIT 1';
                        //prepare query to go to the database
                        $stmtRating = $db->prepare($queryRating);
                        $stmtRating->bindValue(':ratingid', urldecode(strtolower($_POST["rating"])), PDO::PARAM_STR);
                        //sends query to database and returns results
                        $stmtRating->execute();

                        $ratingRowSet = $stmtRating->fetchAll(PDO::FETCH_ASSOC);
                        print_r($ratingRowSet);
                        echo $ratingRowSet[0]["ratingid"];

                        $ratingid = -1;
                        if(!empty($ratingRowSet))
                        {
                            $ratingid = $ratingRowSet[0]["ratingid"];
                        }
                        else
                        {
                            throw new Exception("Please select a valid rating.");
                        }

                        echo $ratingid . '<br>';


                        //********THIS IS FOR ADDING A STUDIO TO A MOVIE*****
                        if(empty($_POST["studio"]) || $_POST["studio"] === "")
                        {
                            throw new Exception("Studio entry is empty.  Please add the studio.");
                        }
                        $queryStudio = 'SELECT studioid FROM studio WHERE studioname = :studioid LIMIT 1';
                        //prepare query to go to the database
                        $stmtStudio = $db->prepare($queryStudio);
                        $stmtStudio->bindValue(':studioid', urldecode(strtolower($_POST["studio"])), PDO::PARAM_STR);
                        //sends query to database and returns results
                        $stmtStudio->execute();

                        $studioRowSet = $stmtStudio->fetchAll(PDO::FETCH_ASSOC);
                        print_r($studioRowSet);
                        echo $studioRowSet[0]["studioid"];

                        $studioid = -1;
                        if(!empty($studioRowSet))
                        {
                            //does studio exist
                            $studioid = $studioRowSet[0]["studioid"];
                        }
                        else
                        {
                            //add studio
                            $queryStudio ='INSERT INTO studio (studioname) VALUES (:studioid) RETURNING studioid';
                            $stmtStudio = $db->prepare($queryStudio);
                            $stmtStudio->bindValue(':studioid', urldecode(strtolower($_POST["studio"])), PDO::PARAM_STR);
                            //sends query to database and returns results
                            $stmtStudio->execute();

                            $studioRowSet = $stmtStudio->fetchAll(PDO::FETCH_ASSOC);
                            print_r($studioRowSet);
                            echo $studioRowSet[0]["studioid"];

                            if(!empty($studioRowSet))
                            {
                                //does studio exist
                                $studioid = $studioRowSet[0]["studioid"];
                            }
                            else
                            {
                                throw new Exception("Could not add studio to database");
                            }
                        }

                        echo $studioid . '<br>';


                        //********THIS IS FOR UPDATING A MOVIE IN THE DATABASE*****
                        if(empty($_POST["title"]) || $_POST["title"] === "")
                        {
                            throw new Exception("Title entry is empty.  Please add the title of your movie.");
                        }

                        //add movie
                        $queryTitle = 'UPDATE
                                            movie
                                        SET
                                            title = :title,
                                            year = :year,
                                            description = :description,
                                            studioid = :studioid,
                                            genreid = :genreid,
                                            ratingid = :ratingid
                                        WHERE
                                            movieid = :movieIdent';
                        $stmtTitle = $db->prepare($queryTitle);

                        $stmtTitle->bindValue(':title', urldecode(strtolower($_POST["title"])), PDO::PARAM_STR);
                        $stmtTitle->bindValue(':year', urldecode(strtolower($_POST["year"])), PDO::PARAM_INT);
                        $stmtTitle->bindValue(':description', urldecode(strtolower($_POST["description"])), PDO::PARAM_STR);
                        //this one is different becauase I am getting the id from the variable declared earlier
                        $stmtTitle->bindValue(':studioid', $studioid, PDO::PARAM_INT);
                        $stmtTitle->bindValue(':genreid', $genreid, PDO::PARAM_INT);
                        $stmtTitle->bindValue(':ratingid', $ratingid, PDO::PARAM_INT);
                        $stmtTitle->bindValue(':movieIdent', $_POST["movieIdent"], PDO::PARAM_INT);

                        //sends query to database and returns results
                        $stmtTitle->execute();



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
                        echo "<br>";
                        print_r($actorRowSet);
                        echo "<br>";

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




            ?>


            <div>
                <form action="https://morning-bastion-33855.herokuapp.com/week4/editMovie.php" method="post">
                    <input type="hidden" name="movieIdent" value="<?php echo $_GET["movieIdent"];?>">
                    Movie Title: <input type="text" name="title" value="<?php echo $stmtRowSet[0]["movie_title"];?>"><br><br>
                    Year: <input type="text" name="year" value="<?php echo $stmtRowSet[0]["movie_year"];?>"><br><br>

                     <textarea rows="20" cols="55" id="div2" name="description"><?php echo $stmtRowSet[0]["movie_desc"];?></textarea><br>
                    Studio: <input type="text" name="studio" value="<?php echo $stmtRowSet[0]["studio"];?>"><br><br>
                    Genre: <select name="genre">
                            <option value="" disabled>Select Genre</option>
                            <option value="adventure" <?php if($stmtRowSet[0]["genre"] === "adventure"){echo "selected";}?>>adventure</option>
                            <option value="comedy" <?php if($stmtRowSet[0]["genre"] === "comedy"){echo "selected";}?>>comedy</option>
                            <option value="crime" <?php if($stmtRowSet[0]["genre"] === "crime"){echo "selected";}?>>crime</option>
                            <option value="docudrama" <?php if($stmtRowSet[0]["genre"] === "docudrama"){echo "selected";}?>>docudrama</option>
                            <option value="drama" <?php if($stmtRowSet[0]["genre"] === "drama"){echo "selected";}?>>drama</option>
                            <option value="fantasy" <?php if($stmtRowSet[0]["genre"] === "fantasy"){echo "selected";}?>>fantasy</option>
                            <option value="historical" <?php if($stmtRowSet[0]["genre"] === "historical"){echo "selected";}?>>historical</option>
                            <option value="historical fiction" <?php if($stmtRowSet[0]["genre"] === "historical fiction"){echo "selected";}?>>historical fiction</option>
                            <option value="horror" <?php if($stmtRowSet[0]["genre"] === "horror"){echo "selected";}?>>horror</option>
                            <option value="mystery" <?php if($stmtRowSet[0]["genre"] === "mystery"){echo "selected";}?>>mystery</option>
                            <option value="romance" <?php if($stmtRowSet[0]["genre"] === "romance"){echo "selected";}?>>romance</option>
                            <option value="science fiction" <?php if($stmtRowSet[0]["genre"] === "science fiction"){echo "selected";}?>>science fiction</option>
                        </select><br><br>
                    Rating: <select name="rating">
                            <option value="" disabled selected>Select Rating</option>
                            <option value="g"<?php if($stmtRowSet[0]["rating"] === "g"){echo "selected";}?>>G</option>
                            <option value="pg"<?php if($stmtRowSet[0]["rating"] === "pg"){echo "selected";}?>>PG</option>
                            <option value="pg-13"<?php if($stmtRowSet[0]["rating"] === "pg-13"){echo "selected";}?>>PG-13</option>
                            <option value="r"<?php if($stmtRowSet[0]["rating"] === "r"){echo "selected";}?>>R</option>
                            <option value="nc-17"<?php if($stmtRowSet[0]["rating"] === "nc-17"){echo "selected";}?>>NC-17</option>
                        </select><br><br>



                    Actor's First Name: <input type="text" id="fname"/><br><br>
                    Actor's Last Name: <input type="text" id="lname"/><br><br>
                    <button type="button" onclick="addItem()">Add Actor To List</button>
                    <button type="button" onclick="removeItem()">Remove Actor From List</button>

                    <ul id="myList">
                    <?php
                    foreach ($actorRowSet as $row)
                    {
                        echo '<li>' . $row["actorname"] . '<input type=\'hidden\' name=\'actors[]\' value=\'' . $row["actorname"] . '\'></li>';
                    }

                    ?>
                    </ul>

                    <input type="submit" value="Edit Movie" name="btnSubmit" ><br><br>
                </form>
            </div>
            <?php
                }//end else
            ?>
        </main>
        <script src="/js/editMovie.js"></script>
    </body>
</html>
