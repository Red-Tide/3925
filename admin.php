<!DOCTYPE html>

<html>
    <head>
        <title>Admin</title> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>


    <body>
    
        <h1>Administration Page</h1>
        <!--
        <button id="getSpread" onclick="getSpreadsheet()">Get SpreadSheet</button>
        
        <button id="start" onclick="start()">Start Queue</button>
        
        <button id="stop" onclick="stop()">Stop Queue</button>
        -->
        
        <a href="admin.php?hello=true">Get Spreadsheet</a>
        
        <?php 
        
        function get_spread() {
            exec ('python /var/www/create-spread.py; sleep 1');
        }
        
        if (isset($_GET['hello'])) {
            get_spread();
        }
        
        ?>
        
    
        
    </body>


</html>