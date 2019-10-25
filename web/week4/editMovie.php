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
                <li  class="active"><a href="https://morning-bastion-33855.herokuapp.com/week4/editMovie.php">Edit Movie</a></li>
                 <li><a href="https://morning-bastion-33855.herokuapp.com/week4/addMovie.php">Add Movie</a></li>
            </ul>
        </nav>

        <main>

            <div>
                <form action="https://morning-bastion-33855.herokuapp.com/week4/movieResults.php" method="post">
                    Movie Title: <input type="text" name="title"><br><br>
                    Year: <input type="text" name="title"><br><br>

                     <textarea rows="20" cols="55" id="div2" >Add your movie description here.</textarea><br>
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

                    <ul id="myList">Actor's To Be Added</ul>

                    <input type="submit" value="Add Movie" ><br><br>
                </form>




            </div>
        </main>
        <script src="/js/editMovie.js"></script>
    </body>
</html>
