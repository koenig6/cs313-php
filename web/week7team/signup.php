<!DOCTYPE html>
<html lang="en-US">
	<head>

	   <meta charset="utf-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <title>Signup Page</title>

	</head>
	<body>
        <nav>
            <ul class="navigation">

                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/week7team/signin.php">Sign in page</a></li>

            </ul>
        </nav>



         <?php
        //require 'password.php';

        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnSubmit']))
        {


                 try
                    {
                            $passwordHash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

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


                            //inserting new user into database
                            $queryUser = 'INSERT INTO users (username, userpassword) VALUES(:name, :hashpassword)';
                            $stmt = $db->prepare($queryUser);
                            $stmt->bindValue(':name', $_POST["username"], PDO::PARAM_STR);
                            $stmt->bindValue(':hashpassword', $passwordHash, PDO::PARAM_STR);
                            $stmt->execute();

                            header("Location: https://morning-bastion-33855.herokuapp.com/week7team/signIn.php");




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
         ?>

        <div>
                <form action="" method="post">
                    Please enter your username:<input type="text" name="username"><br><br>
                    password (7 letters and a number):<input type="password" id ="pwd1" name="pwd"><br><br>
                    password:<input type="password"  id="pwd2" name="pwd2"><br><br>
                    <input type="submit" value="addUser" name="btnSubmit" onsubmit="return isIdentical()" ><br><br>

                </form>
        </div>
        <?php }//end else ?>

        <script>
            function isIdentical() {
    var item1 = document.getElementById("pwd1").value
    var item2 = document.getElementById("pwd2").value
    if (item1.length != item2.length) {
        alert("Passwords are not identical.");
        return false;
    }
    for (var i = 0; i < item1.length; i++) {
        if (item1.charAt(i) != item2.charAt(i)) {
            alert("Passwords are not identical.");
            return false;
        }
    }
}

        </script>

	</body>
</html>
