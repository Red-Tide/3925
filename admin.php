<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<h1>Lights of Hope: Administration</h1>
    <form method="post" name="login">
        <label>Admin:</label>
        <input type="text" name="admin"/>
        <br />
        <br />
        <label>Password:</label>
        <input type="password" name="passwd"/>
        <br />
        <br />
<button type="submit" onclick="submit">Login</button>
    </form>
        </body>
</html>
<?php
if(isset($_POST['admin']) && $_POST['passwd']){
if ($_POST['admin'] == "lhope" && $_POST['passwd'] == "pumpkinpie99"){
    $_SESSION['login'] = true;   
}
echo $_POST['admin'];
echo "\n";
echo $_POST['passwd'];
}
    
if(isset($_SESSION['login'])){
    header("location: panel.php");
}
?>