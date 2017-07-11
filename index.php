<?php
error_reporting(0);
include ('connect.php');
$con = mysqli_connect("localhost", "root", "","lights");

$cookie_name = "user";
$cookie_value = "default";

$cookie_insName = "instruction";
$cookie_insValue = "instructionValue";


//setcookie($cookie_insName,$cookie_insValue,time() - 3600);
/*
if(!isset($_COOKIE[$cookie_name])) {
    echo "The cookie is not set";
}
else{
    echo "cookie set";
}

if(!isset($_COOKIE[$cookie_insName])) {
    echo "The instruction cookie is not set";
}
else{
    echo "cookie set";
}
*/
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
    
    <!-- Load facebook SDK for JS -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) 
                return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
            fjs.parentNode.insertBefore(js, fjs);
        }
            (document, 'script', 'facebook-jssdk')
        );
    </script>

	<div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#" class="btnLogin">Login</a>
        <a href="#" class="btnAbout">About Us</a>
        <a href="#" onclick="openShare()">Share<span class="caret"></span></a>
        <div id="shareMenu">
          <a href="http://twitter.com/intent/tweet?text=Lights+of+Hope!"><img src="images/twitter.png" id="twitter" /></a>
            
          <div data-href="http://159.203.33.253" data-layout="button_count" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F159.203.33.253%2F&amp;src=sdkpreparse"><img src="images/fb.png" id="fb" /></a></div>

        </div>
        
        <!-- Privacy policy link -->
        <a href="http://helpstpauls.com/privacy-policy">Privacy Policy</a>
        
        <!-- donate btn in side menu -->
        <a href="https://secure3.convio.net/sphf/site/Donation2;jsessionid=00000000.app340b?df_id=1480&mfc_pref=T&1480.donation=form1&NONCE_TOKEN=A4F10372DEF9F743AC3BC962CD7F5E4F&_ga=2.146544183.241198011.1497985408-1422913765.1496341390">Donate</a>
        
	</div>


	<span style="font-size:30px;cursor:pointer" onclick="openNav()"> <img src="images/hamburger.png" width="100px" /> </span>


	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-6 col-md-offset-3">
				<img src="images/big_title1.png" class="celebrate" />
			</div>
		</div>
	</div>
    
    <!-- List of sounds for star wheel -->
    <audio src="sounds/bigStar.wav" type="audio/wav" id="bigStar"></audio>
    <audio src="sounds/smallStar.wav" type="audio/wav" id="smallStar"></audio>
    
    <!-- Big star animation -->
    <div class="container">
        
        <a href="#wheel" class="wheel-button">
            
            <span><img src="images/big_star.png" width="800%" onclick="bigStarSound()"/></span>
                
        </a>
	    
      <ul id="wheel" data-angle="all">
        <li class="item"><a href="#home"><img src="images/star1.png" width="100%" height="100%" onclick="smallStarSound()" /></a></li>
        <li class="item"><a href="#home"><img src="images/star2.png" width="100%" height="100%" onclick="smallStarSound()" /></a></li>
        <li class="item"><a href="#home"><img src="images/star3.png" width="100%" height="100%" onclick="smallStarSound()" /></a></li>
        <li class="item"><a href="#home"><img src="images/star4.png" width="100%" height="100%" onclick="smallStarSound()" /></a></li>
      </ul>
    </div>
    
    <img src="images/hospital.png" class="hospital" />

    
    <!-- All of the bottom right absolute position stuff together -->
    <div class="bottom-right">
        <!-- donate button -->
        <a href="https://secure3.convio.net/sphf/site/Donation2;jsessionid=00000000.app340b?df_id=1480&mfc_pref=T&1480.donation=form1&NONCE_TOKEN=A4F10372DEF9F743AC3BC962CD7F5E4F&_ga=2.146544183.241198011.1497985408-1422913765.1496341390">
            <img class="donate pull-right" src="images/donate.png" />
        </a>
        
        <!-- smaller social media icons -->
        <div data-href="http://159.203.33.253" data-layout="button_count" data-size="large" data-mobile-iframe="false" ><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F159.203.33.253%2F&amp;src=sdkpreparse">
            <img src="images/fb_small.png" class=" fb-btn" />
        </a></div>
        
        <a href="http://twitter.com/intent/tweet?text=Lights+of+Hope!">
            <img src="images/twitter_sm.png" class=" twitter-btn " />
        </a>
    </div>



	<div class="modal-bg"> 
        
    <!-- login instruction -->
        <img src="images/login_instruc.png" class="login-instruc" />

        <div class="modal">
            <span>Register<a href="#close" id="close">×</a></span>
            <form method="post">
                <input id="username" name="name" type="textbox" class="input" placeholder="Name" required>
                <input id="password" name="email" type="email" class="input" placeholder="Email" required>
                <div class="emailCheck">
                <input type="checkbox" checked="checked" name="checkBox" value="emailCheck" />
                Yes, I would like to receive emails from St. Paul's Foundation.</div>
                <button name="submit" id="submit" type="submit" class="btnSubmit">Play!</button>
 

            </form>
        </div>
	</div>
    
    <div class="modal2-bg" onclick="closeBlank()">
        <img src="images/instruction1.png" class="instruction" />
    </div>
    
    <div class="modal3-bg" onclick="closeBlank2()">
        <img src="images/instruction2.png" class="instruction" />
    </div>
    

	<?php

       // define("name",$_POST["name"]);
       // define("email",$_POST["email"]);
    
        $name = $_POST["name"];
        $email = $_POST["email"];
		
		//echo name;
		//$query = "SELECT * FROM tuser"; 
		//$result = mysqli_query($con, $query);
		//$row = mysqli_fetch_array($result);
			
		
		$query = "INSERT INTO tuser (email,name) VALUES('$email','$name')";
		mysqli_query($con,$query);
			
        if(!empty($name)){
            $cookie_value = $email;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30 * 200), "/");
    
            if(isset($_COOKIE[$cookie_name])){
                echo "cookie is set";
            }
        }
	?>
<!--
  <script src='//zaole.net/sliding.js'></script>


  <script src="//assets.codepen.io/assets/common/stopExecutionOnTimeout-6c99970ade81e43be51fa877be0f7600.js"></script>
-->
  <script>
    
    function setCookie(c_name, value, expiredays) {
        var exdate = new Date()
        exdate.setDate(exdate.getDate() + expiredays)
        document.cookie=c_name+ "=" + escape(value) +
        ((expiredays==null) ? "" : ";expires=" + exdate.toGMTString())
    }
      
    function getCookie(c_name) {
        if (document.cookie.length > 0) {
            c_start=document.cookie.indexOf(c_name + "=")

            if (c_start != -1) { 
                c_start = c_start + c_name.length + 1 
                c_end=document.cookie.indexOf(";", c_start)

                if (c_end == -1) c_end = document.cookie.length
                    return unescape(document.cookie.substring(c_start, c_end))
            } 
        }
        return ""
    }

		$('.btnLogin').click(function () {
			$('.modal').css('display', 'block');
			$('.modal-bg').fadeIn();
		});

		$('#close').click(function () {
			$('.modal-bg').fadeOut();
			$('.modal').fadeOut();
			return false;
		});
      
        function closeBlank(){
            $('.modal2-bg').fadeOut();
            $('.modal3-bg').fadeIn();
            
        }
      
        function closeBlank2(){
            $('.modal3-bg').fadeOut();
            //$('.modal-bg').fadeOut();
            
            
        }
      

		function start(){
			$('.modal-bg').fadeOut();
            $('.modal2-bg').fadeOut();
            $('.modal3-bg').fadeOut();
			$('#modal').fadeOut();
            var instruction = getCookie("instruction");
            if(!instruction){
                console.log("no cookie");
                $('.modal2-bg').fadeIn();
                //$('.modal3-bg').fadeOut();
                setCookie("instruction", "instructionValue", 200);
                //setcookie($cookie_insName, $cookie_insValue, time() + (86400 * 30 * 200), "/");
                
            }
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
      
        // Big star sound
        function bigStarSound() {
            document.getElementById("bigStar").play();
        }
      
        // Small star sound
        function smallStarSound() {
            document.getElementById("smallStar").play();
        }
      
	</script>
</body>

</html>
