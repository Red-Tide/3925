<?php
error_reporting(0);
include ('connect.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lights of Hope</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<script type="text/javascript" src="jquery-1.9.1.js"></script>
	<script src="//assets.codepen.io/assets/libs/modernizr-0e41cf622f0788eca25945c37bdc5b15.js"></script>
	<script type="text/javascript" src="jquery.wheelmenu.js"></script>
	<script>
        $(document).ready(function(){
            $(".wheel-button").wheelmenu({
                trigger: "click",
                animation: "fly",
                animationSpeed: "slow"
            });
        });
	</script>
</head>
    
<body onload="start()">

	<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#" class="btnLogin">Login</a>
        <a href="#" class="btnAbout">About Us</a>
        <a href="#" onclick="openShare()">Share<span class="caret"></span></a>
        <div id="shareMenu">
          <a href="https://twitter.com/home/?status=LightsOfHope!"><img src="images/twitter.png" id="twitter" /></a>
          <a href=""> <img src="images/fb.png" id="fb" /></a>
        </div>
            <a href="https://secure3.convio.net/sphf/site/Donation2;jsessionid=00000000.app340b?df_id=1480&mfc_pref=T&1480.donation=form1&NONCE_TOKEN=A4F10372DEF9F743AC3BC962CD7F5E4F&_ga=2.146544183.241198011.1497985408-1422913765.1496341390">Donate</a>
	</div>


	<span style="font-size:30px;cursor:pointer" onclick="openNav()"> <img src="images/hamburger.png" width="100px" /> </span>


	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-6 col-md-offset-3">
				<img src="images/big_title.png" class="celebrate" />
			</div>
		</div>
	</div>

    <!-- Big star animation -->
    <div class="container">
        
        <a href="#wheel" class="wheel-button">
            <span><img src="images/big_star_click.png" width="60px" /></span>
        </a>
	    
      <ul id="wheel" data-angle="all">
        <li class="item"><a href="#home"><img src="images/big_star.png" width="30px" height="30px" /></a></li>
        <li class="item"><a href="#home"><img src="images/big_star.png" width="30px" height="30px" /></a></li>
        <li class="item"><a href="#home"><img src="images/big_star.png" width="30px" height="30px" /></a></li>
        <li class="item"><a href="#home"><img src="images/big_star.png" width="30px" height="30px" /></a></li>
        <li class="item"><a href="#home"><img src="images/big_star.png" width="30px" height="30px" /></a></li>
      </ul>
    </div>

    <img src="images/hospital.png" class="hospital" />


    <a href="https://secure3.convio.net/sphf/site/Donation2;jsessionid=00000000.app340b?df_id=1480&mfc_pref=T&1480.donation=form1&NONCE_TOKEN=A4F10372DEF9F743AC3BC962CD7F5E4F&_ga=2.146544183.241198011.1497985408-1422913765.1496341390">
        <img class="donate" src="images/donate.png" />
    </a>




	<div class="modal-bg">
	<div id="modal" class="col-xs-6 col-md-3">
		<span>Sign In<a href="#close" id="close">×</a></span>
		<form method="post">
			<input id="username" name="name" type="textbox" placeholder="Name" required>
			<input id="password" name="email" type="textbox" placeholder="Email" required>
			<button name="submit" id="submit" type="submit">Sign in</button>

		</form>
	</div>
	</div>
	<?php
		

		$name = $_POST["name"];
		$email = $_POST["email"];
		
		
		$query = "SELECT * FROM tuser"; 
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
			
		
		$query = "INSERT INTO tuser (email,name) VALUES( '$email', '$name')";
		mysql_query($query);
			
	?>
<!--
  <script src='//zaole.net/sliding.js'></script>


  <script src="//assets.codepen.io/assets/common/stopExecutionOnTimeout-6c99970ade81e43be51fa877be0f7600.js"></script>
-->
  <script>

		$('.btnLogin').click(function () {
			$('#modal').css('display', 'block');
			$('.modal-bg').fadeIn();
		});

		$('#close').click(function () {
			$('.modal-bg').fadeOut();
			$('#modal').fadeOut();
			return false;
		});
    //@ sourceURL=pen.js
/*
		function starMenu() {
		  if($('#star_s1').css('display') == "none"){
				$('#star_s1').css('display', 'block');
			}
			else {
				$('#star_s1').css('display', 'none');
			}

            if($('#star_s2').css('display') == "none"){
				$('#star_s2').css('display', 'block');
			}
			else {
				$('#star_s2').css('display', 'none');
			}

            if($('#star_s3').css('display') == "none"){
				$('#star_s3').css('display', 'block');
			}
			else {
				$('#star_s3').css('display', 'none');
			}

            if($('#star_s4').css('display') == "none"){
				$('#star_s4').css('display', 'block');
			}
			else {
				$('#star_s4').css('display', 'none');
			}

            if($('#star_s5').css('display') == "none"){
				$('#star_s5').css('display', 'block');
			}
			else {
				$('#star_s5').css('display', 'none');
			}

		}

		function starWork(){

			if(flag == "none"){
				$('#modal').css('display', 'block');
				$('.modal-bg').fadeIn();
			}
			else{
				alert("sending single to control panel");
			}
		}
*/

		function start(){
			$('.modal-bg').fadeOut();
			$('#modal').fadeOut();
		}

		function openNav() {
			document.getElementById("mySidenav").style.width = "250px";
			document.getElementById("main").style.marginLeft = "250px";
			document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
			document.getElementById("main").style.marginLeft= "0";
			document.body.style.backgroundColor = "white";
		}

        // Share options
        function openShare() {
            if ($('#shareMenu').css('display') == "none") {
				$('#shareMenu').css('display', 'block');
			} else {
				$('#shareMenu').css('display', 'none');
			}
        }
	</script>
</body>
<!--
<footer>
	<p>footer</p>
</footer>
-->
</html>