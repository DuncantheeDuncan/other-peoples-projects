<?php
session_start();
require_once("../connection.php");

// $userID = $_SESSION['User_ID'];
$sql = "SELECT * FROM Users WHERE UserID = ?";

if ($stmt = mysqli_prepare($conn, $sql)) {
  mysqli_stmt_bind_param($stmt, "i", $param_id);
  $param_id = trim($_GET["UserID"]);
  // Attempt to execute the prepared statement
  if (mysqli_stmt_execute($stmt)) {
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 1) {
      /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      // Retrieve individual field value
      $User = $row["UserID"];
      $name = $row['Names'];
      $surname = $row['Surname'];
      $hashName = $row['Username'];
    }
  } else {
    echo "Oops! Something went wrong";
  }
}
$status = $statusMsg = '';
if (isset($_POST["submit"])) {
  $status = 'error';
  if (!empty($_FILES["image"]["name"])) {
    // Get file info 
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    // Allow certain file formats 
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
      $image = $_FILES['image']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));

      // Insert image content into database 
      $insert = $conn->query("UPDATE UserDetails set Profile='" . $imgContent . "' WHERE UserID='" . $User . "'");

      if ($insert) {
        $status = 'success';
        $statusMsg = "File uploaded successfully.";
      } else {
        $statusMsg = "File upload failed, please try again.";
      }
    } else {
      $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
  } else {
    $statusMsg = 'Please select an image file to upload.';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/profileStyle.css"/>
  <title>Document</title>

 
</head>

<body>
  <div class="row ">
    <div class="column column1 scrolls" style="background-color:rgb(11, 19, 46);">
      <?php
      $userInfo = mysqli_query($conn, "SELECT * FROM UserDetails WHERE UserID = $User");
      $info = mysqli_fetch_array($userInfo);
      ?>
      <?php if ($info['Profile'] != null) { ?>
        <img class="profilepic" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($info['Profile']); ?>" />
      <?php } else { ?>
        <img class="profilepic" src="avatar.png" alt="Avatar">
        </form>

      <?php } if($_SESSION['User_ID']==$User){?>
      <form method="post" enctype="multipart/form-data">
        <label>Change Profile:</label>
        <input type="file" name="image"><br><br>
        <input type="submit" name="submit" class="submit" value="Upload">
      </form>
      <?php } ?>
      <table>
        <tr class="mid">
          <td colspan="2"><b><?php echo  $name . " " . $surname; ?></b></td>
        </tr>
        <tr class="mid">
          <td colspan="2"><?php echo  "#" . $hashName; ?><br></td>
        </tr><?php if($_SESSION['User_ID']==$User){ ?>
        <tr class="mid">
          <td colspan="2"><?php  echo  "<a href='EditUser.php?UserID=" . $row['UserID'] . "' target='main' >" ?>Edit</a><br><br></td>
        </tr>
        <?php } ?>
        <tr class="mid">
          <td colspan="2"><?php if ($info['About'] != null) {
                            echo  $info['About'];
                          } ?><br><br></td>
        </tr><br>
        <tr>
          <td><?php if ($info['PhoneNumber'] != null) {
                echo  "Phone Number "; ?></td>
          <td><?php echo  $info['PhoneNumber'];
              } ?></td>
        </tr>
        <tr>
          <td><?php if ($info['DateOfBirth'] != null) {
                echo  "Date Of Birth"; ?></td>
          <td><?php echo $info['DateOfBirth'];
              } ?></td>
        </tr>

        <tr>
          <td><?php if ($info['Gender'] != null) {
                echo  "Gender "; ?></td>
          <td><?php echo  $info['Gender'];
              } ?></td>
        </tr>
      </table>
    </div>
    <div class="column column2 scrolls">
      <?php
      $userID = $_SESSION['User_ID'];
      $result = mysqli_query($conn, "SELECT * FROM Post Where UserID = $User ORDER BY DateOfPost DESC");
      $i = 0;
      while ($row = mysqli_fetch_array($result)) {
        $posterID = $row["UserID"];
        $poster = mysqli_query($conn, "SELECT Names,Surname,Username FROM Users WHERE UserID = $posterID");
        $row1 = mysqli_fetch_array($poster);
      ?>
        <div class="post">
          <label><?php echo $row1["Names"] . " " . $row1["Surname"]; ?></label><span> <?php echo "#" . $row1["Username"]; ?></span><br>
          <span class="time"> <?php echo $row["DateOfPost"]; ?></span>
          
          <?php
          if ($row["PostText"] != null) {
          ?>
            <p class="textPost">
              <?php
              echo $row["PostText"];
              ?>
            </p>
          <?php
          }
          if ($row["PostImage"] != null) {
          ?>
            <img class="imagePosted" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['PostImage']); ?>" /><br><br>

          <?php
          }
          ?>
        </div>
      <?php
        $i++;
      }
      ?>
    </div>
  </div>
</body>

</html>