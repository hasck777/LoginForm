<?php
function phpAlert($msg) {
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
    <html>
<head>
<link href="main.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="createaccount-page">
        <div class="form">
<form action="createaccount.php">
  <div class="container">
    <label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <input type="checkbox" checked="checked"> Remember me
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button"  class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
</div>
</div>
</body>
</html>

   <script type="text/javascript">alert("' $msg '")</script>
   <script type="text/javascript">window.location.href="createaccount.html"</script>
EOT;
}
phpAlert($_POST['email'] . "   " . $_POST['psw']); 
file_put_contents ("users.txt", $_POST['email'] . "   " . $_POST['psw'], FILE_APPEND | LOCK_EX);
?>