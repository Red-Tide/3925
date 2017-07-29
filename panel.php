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
        <head>
            <title>Admin</title>
        </head>
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
    shell_exec ('killall nodejs; nodejs server.js &; disown');
    shell_exec ('sudo echo blah > /var/www/some.txt');
}

if (isset($_POST['get_data'])) {
    echo "Grabbing the Database";
    exec('/usr/bin/python /var/www/html/create-spread.py');
    //header("location:lightsofhope.xlsx");
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("location: admin.php");
    die();
}
?>
