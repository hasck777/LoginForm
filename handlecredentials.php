<?php
function phpBackDrop($msg)
{
    echo <<<EOT

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="main.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="main.js"></script>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form class="register-form">
                <input placeholder="name"/>
                <input placeholder="password"/>
                <input placeholder="email address"/>
                <button>create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" action="handlecredentials.php" method="POST">
                <input placeholder="$msg"/>
                <input placeholder="password"/>
                <button onclick="login()">login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
    </div>
</body>
</html>


   <script type="text/javascript">alert("' $msg '")</script>
EOT;
}


function phpAlert($msg)
{
    echo <<<EOT
   <script type="text/javascript">alert("' $msg '")</script>
EOT;
}

function phpRedirect()
{
    echo <<<EOT
   <script type="text/javascript">window.location.href="index.html"</script>
EOT;
}

function phpLoginRedirect()
{
    echo <<<EOT
   <script type="text/javascript">window.location.href="megakit/HTML/index.html"</script>
EOT;
}


phpBackDrop($_POST['name']);
$userFound = False;
$handle    = fopen("users.txt", "r");
phpAlert("Checking For User");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $keywords = preg_split("/[\s]+/", $line);
        if ($_POST['name'] == $keywords[0] && $_POST['password'] == $keywords[1]) {
            $userFound = True;
            phpAlert("User Found");
        }
    }

    
    fclose($handle);
} else {
    // error opening the file.
}
if($userFound==False)
{
   phpAlert("User Not Found");
   phpRedirect();
}
else
{
	phpLoginRedirect();
}

?>