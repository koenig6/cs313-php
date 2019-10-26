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
               <h2>Add Movie To Database Page</h2>
        </header>

        <nav>
            <ul class="navigation">
                <li><a href="https://morning-bastion-33855.herokuapp.com/assignMain.php">Home Page</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week4/movie.php">Movie Database</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/week4/editMovie.php">Edit Movie</a></li>
                <li  class="active"><a href="https://morning-bastion-33855.herokuapp.com/week4/addMovie.php">Add Movie</a></li>
            </ul>
        </nav>

        <main>
            <?php

            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
               if(isset($_POST['btnSubmit']))
               {

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


                        //********THIS IS FOR ADDING A RATING TO A NEW MOVIE*****
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


                        //********THIS IS FOR ADDING A STUDIO TO A NEW MOVIE*****
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




                         //********THIS IS FOR ADDING A NEW MOVIE TO THE DATABASE*****
                        if(empty($_POST["title"]) || $_POST["title"] === "")
                        {
                            throw new Exception("Title entry is empty.  Please add the title of your movie.");
                        }

                        //add movie
                        $queryTitle = 'INSERT INTO movie (title, year, description, studioid, genreid, ratingid) VALUES (:title, :year, :description, :studioid, :genreid, :ratingid)RETURNING movieid';
                        $stmtTitle = $db->prepare($queryTitle);

                        $stmtTitle->bindValue(':title', urldecode(strtolower($_POST["title"])), PDO::PARAM_STR);
                        $stmtTitle->bindValue(':year', urldecode(strtolower($_POST["year"])), PDO::PARAM_INT);
                        $stmtTitle->bindValue(':description', urldecode(strtolower($_POST["description"])), PDO::PARAM_STR);
                        //this one is different becauase I am getting the id from the variable declared earlier
                        $stmtTitle->bindValue(':studioid', $studioid, PDO::PARAM_INT);
                        $stmtTitle->bindValue(':genreid', $genreid, PDO::PARAM_INT);
                        $stmtTitle->bindValue(':ratingid', $ratingid, PDO::PARAM_INT);

                        //sends query to database and returns results
                        $stmtTitle->execute();

                        $titleRowSet = $stmtTitle->fetchAll(PDO::FETCH_ASSOC);
                        print_r($titleRowSet);
                        echo $titleRowSet[0]["movieid"];

                        $movieid = -1;
                        if(!empty($titleRowSet))
                        {
                            //
                            $movieid = $titleRowSet[0]["movieid"];
                        }
                        else
                        {
                            throw new Exception("Could not add movie to database");
                        }


                        echo "New Movie: " . $movieid . '<br>';


                        //****************ASSOCIATE MOVIE TO ACTORS********************
                        foreach($actorids as $actorid)
                        {
                            $queryAM = 'INSERT INTO movietoactor (movieid, actorsid) VALUE (:movieid, :actorsid)';
                            //prepare query to go to the database
                            $stmtAM = $db->prepare($queryAM);
                            $stmtAM->bindValue(':movieid', $movieid, PDO::PARAM_INT);
                            $stmtAM->bindValue(':actorsid', $actorid, PDO::PARAM_INT);
                            //sends query to database and returns results
                            $stmtAM->execute();
                        }

                        echo "Movie added successfully!<br>";

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

               }//end of if isset statement
                else
                {
                   echo 'Could not add movie.';

                }
            }//end if SERVER statement
            else
            {

            ?>

            <div>
                <form action="https://morning-bastion-33855.herokuapp.com/week4/addMovie.php" method="post">
                    Movie Title: <input type="text" name="title"><br><br>
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
                <?php

                }//end else

                ?>


            </div>
        </main>
        <script src="/js/editMovie.js"></script>
    </body>
</html>
