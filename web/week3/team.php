<?php

    if($_POST["name"])
    {
        echo ("<!DOCTYPE html>
<html lang="en-US">
	<head>

	   <meta charset="utf-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/helloCss.css">
        <title>Team</title>

	</head>
	<body>");
        echo  $_POST["name"];
        echo $_POST["email"];
        echo $_POST["major"];
        echo "</body> </html>";

    }
    else
    {


?>

<!DOCTYPE html>
<html lang="en-US">
	<head>

	   <meta charset="utf-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/helloCss.css">
        <title>Team</title>

	</head>
	<body>


        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <input name="name" type="text"/>
        <input name="email" type="email"/>

        <input type="radio" name="major" value="cs">Computer Science
        <input type="radio" name="major" value="wdd"> Web Design and Dev.
        <input type="radio" name="major" value="cit">Computer Info Tech
        <input type="radio" name="major" value="ce">Computer Engineering
        <textarea rows = "5" cols = "50" name = "description">
            Comments
         </textarea>

        <input type = "submit" value = "Submit" />




    </form>

	</body>
</html>
<?php

    }
?>
