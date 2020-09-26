<?php
require_once("../connection.php");
if (isset($_POST['username'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $newPass = "UPDATE Users set PassWord ='$password'  WHERE Username ='$username' OR Email='$username'";
  mysqli_query($conn, $newPass);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/style.css"/>
  <link rel="stylesheet" type="text/css" href="../css/loginStyle.css"/>
  <title>Change Password</title>
  
</head>

<body>
  <div class="container">
    <form method="post">

      <div>
        <label class="label-email">

          <input type="text" class="text" name="username" placeholder="username" tabindex="1" required />
          <span class="required">Username</span>
        </label>
      </div>
      
      <div>
        <label class="label-email">

          <input type="password" class="text" name="password" placeholder="username" tabindex="1" required />
          <span class="required">New Password</span>
        </label>
      </div>

      <div>
        <label class="label-email">

          <input type="password" class="text" name="password" placeholder="confirm password" tabindex="1" required />
          <span class="required">Confirm Password</span>
        </label>
      </div>

      <input type="submit" value="CHANGE PASSWORD">
      
      <div class="email">
        <a href="index.php">Cancel</a>

      </div>

    </form>
    
  </div>
</body>

</html>