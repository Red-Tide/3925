<?php 
session_start();

if (!isset($_SESSION['login'])) {
  header('Location: admin.php');
}
extract($_POST);

?>

<!DOCTYPE html>
<html>
<body>

<h1>Administration</h1>
<form method="post" name="adminpanel">
<button type="submit" name="restart" onclick="restart">Restart Queue</button>
<button type="submit" name="get_data" onclick="get_data">Get Spreadsheet</button>
<button type="submit" name="logout" onclick="logout">Logout</button>
</form>
<hr />
</body>
</html>

<?php
#redirect to login screen if logout button pressed

if (isset($_POST['restart'])) {
  echo "The Queue has been Restarted";
  exec ('killall nodejs; nodejs server.js &; disown');
}

if (isset($_POST['get_data'])) {
  echo "Grabbing the Database";
  exec('python create-spread.py');
  header("location:lightsofhope.xlsx");
}



if (isset($_POST['logout'])) {
    session_destroy();
    header("location: admin.php");
    die();
}
?>