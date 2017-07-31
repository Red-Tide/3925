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
            <title>Admin Control Panel</title>
        </head>
        <h1>Control Panel</h1>
        <form method="post" name="adminpanel">
            <button type="submit" name="restart" onclick="restart">Restart Queue</button>
            
            <button type="submit" name="start_server" onclick="start_server">Start Server</button>
            
            <button type="submit" name="kill_server" onclick="kill_server">Kill Server</button>
            
            <button type="submit" name="get_data" onclick="get_data">Get Spreadsheet</button>
            
            <button type="submit" name="logout" onclick="logout">Logout</button>
        </form>
        <hr />
    </body>
</html>

<?php
#redirect to login screen if logout button pressed

// Start server
if (isset($_POST['start_server'])) {
    $start = shell_exec ("forever start server.js");
    echo "Server started.";
}

// Kill server
if (isset($_POST['kill_server'])) {
    $kill = shell_exec ("forever stop 0");
    echo "Server stopped.";
}

// Restarts server
if (isset($_POST['restart'])) {
    echo "The Queue has been Restarted";
    $output = shell_exec ("forever stop 0;forever start server.js 2>&1");
}

// Downloads the database as spreadsheet
if (isset($_POST['get_data'])) {
    echo "Grabbing the Database";
    $a = shell_exec("python /var/www/html/create-spread.py");
    header("location: lightsofhope.xlsx");
}

// Logs out of the admin panel
if (isset($_POST['logout'])) {
    session_destroy();
    header("location: admin.php");
    die();
}
?>
