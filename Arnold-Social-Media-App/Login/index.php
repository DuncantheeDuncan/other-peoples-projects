<?php
session_start();
require_once("../connection.php");
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

  if (empty($_POST['name'])) {
    $newName = NULL;
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $Email = $_POST['email'];
    $findUser = "SELECT * from Users Where Email = '$Email' Or Username = '$Email'AND PassWord='$password'";

    $QueryTable = mysqli_query($conn, $findUser);
    $row = mysqli_fetch_array($QueryTable, MYSQLI_ASSOC);
    $currentUser = $row["UserID"];
    $name = $row["Names"];
    $surname = $row["surname"];
    $count = mysqli_num_rows($QueryTable);
    if ($count === 1) {
      $_SESSION['User_ID'] = $currentUser;
      $_SESSION['UserName'] = $name;
      $_SESSION['Surname'] = $surname;
      header("location: ../Profile/frame.php");
    } else {
      // echo "fu";
    }
  } else {
    $userID = abs(crc32(uniqid()));
    $newEmail = $_POST["newEmail"];
    $newName = $_POST['name'];
    $newSurname = $_POST["surname"];
    $newUsername = $_POST["username"];
    $newPassword = $_POST["password"];
    $userTable = $newName . $newSurname;
    $newUser = "INSERT INTO Users(UserID,Email,Names,Surname,Username,PassWord ) VALUES('" . $userID . "','" . $newEmail . "','" . $newName . "','" . $newSurname . "','" . $newUsername . "','" . $newPassword . "')";
    if (mysqli_query($conn, $newUser) === true) {
    } else {
      echo "user not inserted into users" . $conn->error;
    }
    $current_id = mysqli_insert_id($conn);
    $conn->close();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css"/>
  <link rel="stylesheet" type="text/css" href="../css/loginStyle.css"/>
</head>

<body>
  <div class="container">
    <span></span>
    <span></span>
    <span></span>
   
    <div class="main">

      <div class="login_div">

        <form method="post" id="login-form" action="" class="login-form" autocomplete="off" role="main">
          <h1 class="a11y-hidden">Login Form</h1>

          <div>
            
             <label class="label-email">
      <input type="email" class="text" name="email" placeholder="Email" tabindex="1" required />
      <span class="required">Username/Email</span>
    </label>
          </div>

          <input type="checkbox" name="show-password" class="show-password a11y-hidden" id="show-password" tabindex="3" />
  <label class="label-show-password" for="show-password">
    <span>Show Password</span>
  </label>
  <div>
    <label class="label-password">
      <input type="text" class="text" name="password" placeholder="Password" tabindex="2" required />
      <span class="required">Password</span>
    </label>
  </div>
  <input type="submit" value="SIGN IN" />
  <input type="submit" class="signup_tab a" value="SIGN UP" />
   <div class="email">
    <a href="ChangePass.php">Forgot password?</a>

  </div>

  <figure aria-hidden="true">
    <div class="person-body"></div>
    <div class="neck skin"></div>
    <div class="head skin">
      <div class="eyes"></div>
      <div class="mouth"></div>
    </div>
    <div class="hair"></div>
    <div class="ears"></div>
    <div class="shirt-1"></div>
    <div class="shirt-2"></div>
  </figure>
        </form>
        </div>



      <div class="register_div" hidden>
        
        <form method="post" id="login-form" action="" class="login-form" autocomplete="off" role="main">

     <div>
      <label class="label-email">

      <input type="text" class="text" name="name" placeholder="name" tabindex="1" required />
      <span class="required">Name</span>
    </label>
  </div>


<div>
      <label class="label-email">

      <input type="text" class="text" name="surname" placeholder="Surname" tabindex="1" required />
      <span class="required">Surname</span>
    </label>
  </div>

          

<div>
      <label class="label-email">

      <input type="text" class="text" name="username" placeholder="Username" tabindex="1" required />
      <span class="required">Username</span>
    </label>
  </div>


        

<div>
      <label class="label-email">

      <input type="text" class="text" name="newEmail" placeholder="Email Adress" tabindex="1" required />
      <span class="required">Email Adress</span>
    </label>
  </div>
          

<div>
      <label class="label-email">

      <input type="text" class="text" name="password" placeholder="Password" tabindex="1" required />
      <span class="required">Password</span>
    </label>
  </div>

          
          <div>
      <label class="label-email">

      <input type="password" class="text" name="confirm_password" placeholder="Confirm Password" tabindex="1" required />
      <span class="required">Confirm Password</span>
    </label>
  </div>

        
          
            <input type="submit" value="SIGN UP">
          


        </form>

      </div>
    
  </div>
  <script type="text/javascript" src="../JS/jquery-1.3.2.min.js"></script>
  <script type="text/javascript" src="../JS/Main.js"></script>
</body>





<!-- <form method="get" action="javascript: void(0);" id="login-form" class="login-form" autocomplete="off" role="main"> -->
  <!-- <h1 class="a11y-hidden">Login Form</h1> -->
  <!-- <div>
    <label class="label-email">
      <input type="email" class="text" name="email" placeholder="Email" tabindex="1" required />
      <span class="required">Email</span>
    </label>
  </div> -->

  <!-- <input type="checkbox" name="show-password" class="show-password a11y-hidden" id="show-password" tabindex="3" /> -->
  <!-- <label class="label-show-password" for="show-password"> -->
    <!-- <span>Show Password</span> -->
  <!-- </label> -->
  <!-- <div> -->
    <!-- <label class="label-password"> -->
      <!-- <input type="text" class="text" name="password" placeholder="Password" tabindex="2" required /> -->
      <!-- <span class="required">Password</span> -->
    <!-- </label> -->
  <!-- </div> -->

  <!-- <input type="submit" value="Log In" /> -->
  <!-- <div class="email"> -->
    <!-- <a href="#">Forgot password?</a> -->
  <!-- </div> -->

 <!--  <figure aria-hidden="true">
    <div class="person-body"></div>
    <div class="neck skin"></div>
    <div class="head skin">
      <div class="eyes"></div>
      <div class="mouth"></div>
    </div>
    <div class="hair"></div>
    <div class="ears"></div>
    <div class="shirt-1"></div>
    <div class="shirt-2"></div>
  </figure> -->
<!-- </form> -->
</html>