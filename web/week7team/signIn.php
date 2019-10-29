<?php
// Start the session
session_start();

?>
<!DOCTYPE html>
<html lang="en-US">
	<head>

	   <meta charset="utf-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <title>Signin Page</title>

	</head>

    <header>

               <h2>Login Page</h2>
        </header>

        <nav>
            <ul class="navigation">

                <li class="active"><a href="https://morning-bastion-33855.herokuapp.com/week7team/signup.php">Sign up page</a></li>

            </ul>
        </nav>
	<body>

		<div>
                <form action="https://morning-bastion-33855.herokuapp.com/week7team/welcome.php" method="post">
                    Please enter your username:<input type="text" name="username"><br><br>
                    password:<input type="password" name="pwd">><br><br>
                </form>>
        </div>
                if(password_verify(string $password, string $hash))
                             {
                                 echo 'Password is valid!';
                             }
                             else
                             {
                                 echo 'Invalid password';
                             }

	</body>
</html>
