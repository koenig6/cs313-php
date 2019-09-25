<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Jody Koenig CS 313</title>
        <!-- external style references in the proper cascading order -->
        <link href="https://fonts.googleapis.com/css?family=Oswald|Slabo+27px" rel="stylesheet">
        <link href="css/normalize.css" rel="stylesheet"> <!-- normalize useragent/browser defaults -->
        <link href="css/main.css" rel="stylesheet">

    </head>
    <body>
        <header>
        <img src="images/picOfMe.jpg" width="200" height="271" alt="My Picture">
        </header>

        <h1>Jody Koenig - CS 313 - Home Page</h1>

        <?php
        echo "Today is " . date("l ") . date('F, d Y');
        ?>

        <nav>
            <ul class="navigation">
                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/homePage.php">Home Page</a></li>
                <li><a href="https://morning-bastion-33855.herokuapp.com/assignMain.php">Assignments</a></li>
            </ul>
        </nav>

        <main>

            <div class="index">
                <div>
                <img class="home" src="images/eric-nopanen-3skLpaOBlMw-unsplash.jpg" alt="bicyclists riding in sidewalk in open field" width="400" height="266">
                <h3>Family Biking</h3>
                <p>.  </p>
                </div>

                <div>
                <img class="home" src="images/markus-spiske-AfKyYsE9j6w-unsplash.jpg" alt="two bicycles in the sunset" width="400" height="269">
                <h3>Thinking of getting a mountain bike?</h3>
                <p>.</p>
                </div>
            </div>

                <img class="home" src="images/matt-bowden-GZc4fnQsaWQ-unsplash.jpg" alt="bicycle racers" width="400" height="266">
            <h3>Ride the longest off-pavement route in the world.</h3>
            <p>.</p>


            <p>
            I am pretty much someone who loves to be home with my family.  I love going to Six Flags and river rafting and plan to do as much as I can of both!
            </p>

        </main>


        <script src="js/"></script>
    </body>
</html>
