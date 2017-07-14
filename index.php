<?php
error_reporting(0);
include ('connect.php');
$con = mysqli_connect("localhost", "root", "","lights");

date_default_timezone_set('America/Los_Angeles');

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
    
    <meta property="og:url" content="http://104.236.138.127" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Your Website Title" />
    <meta property="og:description" content="Your description" />
    <meta property="og:image" content="http://104.236.138.127/images/logo.png" />
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<script type="text/javascript" src="jquery-1.9.1.js"></script>
	<script src="//assets.codepen.io/assets/libs/modernizr-0e41cf622f0788eca25945c37bdc5b15.js"></script>
	<script type="text/javascript" src="jquery.wheelmenu.js"></script>
    
    <!-- captcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
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
        <a href="#" onclick="openLogin()" class="btnLogin">Login</a>
        <a href="#" onclick="aboutUs()" class="btnAbout">About Us</a>
        <a href="#" onclick="openShare()">Share<span class="caret"></span></a>
        <div id="shareMenu">
          <a href="http://twitter.com/intent/tweet?text=I+just+controlled+St.+Paul’s+Foundation’s+Lights+of+Hope+display+with+my+phone,+click+here+and+you+can+too!+%23LOH2018"><img src="images/twitter.png" id="twitter" /></a>
            
          <div data-href="http://104.236.138.127" data-layout="button_count" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flightsofhope.helpstpauls.com%2F&amp;src=sdkpreparse"><img src="images/fb.png" id="fb" /></a></div>

        </div>
        
        <!-- Privacy policy link -->
        <a href="http://helpstpauls.com/privacy-policy">Privacy Policy</a>
        
        <!-- donate btn in side menu -->
        <a href="https://secure3.convio.net/sphf/site/Donation2;jsessionid=00000000.app340b?df_id=1480&mfc_pref=T&1480.donation=form1&NONCE_TOKEN=A4F10372DEF9F743AC3BC962CD7F5E4F&_ga=2.146544183.241198011.1497985408-1422913765.1496341390">Donate</a>
        
	</div>


	<span style="font-size:30px;cursor:pointer" onclick="openNav()"> <img src="images/hamburger.png" width="100px" /> </span>
    
    <!-- SPF Logo - top right corner -->
    <img src="images/spf_logo.png" class="spfLogo" />

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
            
            <span><img src="images/big_star.png" width="800%" onclick="bigStarClick()"/></span>
                
        </a>
	    
      <ul id="wheel" data-angle="all">
        <li class="item"><a href="#home"><img src="images/blue_star.png" width="100%" height="100%" onclick="smallStarSound()" /></a></li>
        <li class="item"><a href="#home"><img src="images/blue_star2.png" width="100%" height="100%" onclick="smallStarSound()" /></a></li>
        <li class="item"><a href="#home"><img src="images/star3.png" width="100%" height="100%" onclick="smallStarSound()" /></a></li>
        <li class="item"><a href="#home"><img src="images/star4.png" width="100%" height="100%" onclick="smallStarSound()" /></a></li>
      </ul>
    </div>
    
    
    <!-- Hospital image -->
    <img src="images/hospital.png" class="hospital" />

    
    <!-- All of the bottom right absolute position stuff together -->
    <div class="bottom-right">
        <!-- donate button -->
        <a href="https://secure3.convio.net/sphf/site/Donation2;jsessionid=00000000.app340b?df_id=1480&mfc_pref=T&1480.donation=form1&NONCE_TOKEN=A4F10372DEF9F743AC3BC962CD7F5E4F&_ga=2.146544183.241198011.1497985408-1422913765.1496341390">
            <img class="donate pull-right" src="images/donate.png" />
        </a>
        
        <!-- smaller social media icons -->
        <div data-href="http://104.236.138.127" data-layout="button_count" data-size="large" data-mobile-iframe="false" ><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flightsofhope.helpstpauls.com%2F&amp;src=sdkpreparse">
            <img src="images/fb_small.png" class=" fb-btn" />
        </a></div>
        
        <a href="http://twitter.com/intent/tweet?text=I+just+controlled+St.+Paul’s+Foundation’s+Lights+of+Hope+display+with+my+phone,+click+here+and+you+can+too!+%23LOH2018">
            <img src="images/twitter_sm.png" class=" twitter-btn " />
        </a>
    </div>



	<div class="modal-bg"> 
        
        <!-- login instruction -->
        <img src="images/login_instruc.png" class="login-instruc" />

        <div class="modal">
            <span>Register<a href="#close" id="close">×</a></span>
            <form method="post" onsubmit="submitCheck()">
                <input id="username" name="name" type="textbox" class="input" placeholder="Name" required>
                <input id="password" name="email" type="email" class="input" placeholder="Email" required>
                <div class="emailCheck">
                <input type="checkbox" checked="checked" name="checkBox" value="emailCheck" />
                Yes, I would like to receive emails from St. Paul's Foundation.</div>
                <!--
                <div class="g-recaptcha" data-sitekey="6LcaBykUAAAAAJPVSHmOPV6vGwBpszHhq5Z2_0j2"></div>
                -->
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
    
    <!-- about us box -->
    <div class="modal4-bg" onclick="closeBlank3()">
        <div class="aboutUs">
            <h2>
                St. Paul’s Foundation raises funds to support compassionate, inspired care at all Providence Health Care hospitals and residences in British Columbia.
            </h2>

            <p>
                Combined, these sites engage close to 8,000 doctors, health care providers, support staff and researchers who care for hundreds of thousands of British Columbians every year, from neo-natal care to palliative care.
            </p>

            <p>
                Working closely with our care providers, St. Paul’s Foundation is proud to engage our community to support world-class research, education and patient care.
            </p>

            <p>
                Support from the community, especially donations, has been key to Providence Health Care since its founding in 1896. Today, many Providence physicians and researchers are world figures in numerous fields including heart and lung, renal, HIV/AIDS and elder care. Since its founding in 1986, St. Paul’s Foundation has played an integral role in supporting this work.
            </p>

            <p>
                The sites for which St. Paul’s Foundation raises funds include St. Paul’s Hospital, Holy Family Hospital, Mount Saint Joseph Hospital, St. Michael’s Centre, St. Vincent’s: Brock Fahrni, St. Vincent’s: Honoria Conway-Heather, St. Vincent’s: Langara, and Youville Residence.
            </p>
        </div>
    </div>
    

	<?php

       // define("name",$_POST["name"]);
       // define("email",$_POST["email"]);
    
        $name = $_POST["name"];
        $email = $_POST["email"];
        $date = date('m/d/Y h:i:s a', time());
        if (isset($_POST["checkBox"])) {
            $check = 1;    
        } else {
            $check = 0;
        }
        
		
		//echo name;
		//$query = "SELECT * FROM tuser"; 
		//$result = mysqli_query($con, $query);
		//$row = mysqli_fetch_array($result);
			
		
		$query = "INSERT INTO tuser (email, name, login_time, email_check) VALUES('$email','$name', '$date', $check)";
		mysqli_query($con,$query);
			
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
      
        function submitCheck(){
            setCookie("user", "default", 200);
            
        }

		function openLogin() {
			$('.modal').css('display', 'block');
			$('.modal-bg').fadeIn();
		}

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
      
        function closeBlank3() {
            $('.modal4-bg').fadeOut();
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
        function bigStarClick() {
            document.getElementById("bigStar").play();
            if(!getCookie("user")){
                openLogin();
            }
        }
      
        // Small star sound
        function smallStarSound() {
            document.getElementById("smallStar").play();
        }
      
        // about us function
        function aboutUs() {
            $('.modal4-bg').fadeIn();
            $('.aboutUs').css('display', 'block');
        }
      
	</script>
</body>

</html>
