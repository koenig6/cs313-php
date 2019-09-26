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

            <div id="php">
                <?php
                echo "Today is " . date("l ") . date('F, d Y');
                ?>
            </div>

        <nav>
            <ul class="navigation">
                <li class="active" onmouseover="bigNav(this)" onmouseout="normalNav(this)"><a href="https://morning-bastion-33855.herokuapp.com/homePage.php">Home Page</a></li>

                <li><a href="https://morning-bastion-33855.herokuapp.com/assignMain.php">Assignments</a></li>
            </ul>
        </nav>

        <main>

            <h2> A little bit about me</h2>

            <div class="index">
                <div>
                <img class="home" src="images/eric-nopanen-3skLpaOBlMw-unsplash.jpg" alt="people by the pool" width="400" height="266">
                <h3>Time with family and friends</h3>
                <p>I love spending time with my friends and family doing what ever.  </p>
                </div>

                <div>
                <img class="home" src="images/markus-spiske-AfKyYsE9j6w-unsplash.jpg" alt="lap top on desk" width="400" height="269">
                <h3>School</h3>
                <p> I am about half way through my school career </p>
                </div>
            </div>

                <img class="home" src="images/matt-bowden-GZc4fnQsaWQ-unsplash.jpg" alt="roller coaster" width="400" height="266">
            <h3>Riding roller coasters</h3>
            <p> As often as my husband and I can find free time we take our dates to six flags.</p>



        </main>

        <script src="js/mouseOver.js"></script>

    </body>
</html>
