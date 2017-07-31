<!-- 
NOTE: Don't forget to change database password to pumpkinpie99 and login to add disabled for server. 
-->

<?php

error_reporting(0);
//include ('connect.php');

// Add database password when switching between localhost & digital ocean
$con = mysqli_connect("localhost", "root", "", "lights");
//$con = mysqli_connect("localhost", "root", "pumpkinpie99", "lights");

date_default_timezone_set('America/Los_Angeles');

$cookie_name = "user";
$cookie_value = "default";

$cookie_insName = "instruction";
$cookie_insValue = "instructionValue";

//setcookie($cookie_insName,$cookie_insValue,time() - 3600);
//setcookie($cookie_name,$cookie_value,time());

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lights of Hope!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="styles/style.css">
        
        <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="js/jquery.wheelmenu.js"></script>

        <!-- Captcha -->
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>

    
    <body onload="start()">
        <div id="mySidenav" class="sidenav">
            
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            
            <a href="#" data-toggle="modal" data-target="#myLoginModal" class="btnLogin" id="btnLogin">Login</a>
            <!-- Add this in for server: style="display: none" -->
            
            <a href="#" data-toggle="modal" data-target="#myModal">About Us</a>
            <a href="#" onclick="openShare()">Share<span class="caret"></span></a>
            
            <div id="shareMenu">
                <a href="http://twitter.com/intent/tweet?text=I+just+controlled+St.+Paul’s+Foundation’s+Lights+of+Hope+display+with+my+phone,+click+here+and+you+can+too!+http://lightsofhope.com/display+%23LOH2018" target="_blank">
                    <img src="images/twitter.png" id="twitter" alt="Share to Twitter"/>
                </a>

                <div data-href="http://104.236.138.127" data-layout="button_count" data-size="large" data-mobile-iframe="false">
                    <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flightsofhope.helpstpauls.com%2F&amp;src=sdkpreparse">
                        <img src="images/fb.png" id="fb" alt="Share to FaceBook" />
                    </a>
                </div>

            </div>

            <!-- Privacy policy link -->
            <a href="http://helpstpauls.com/privacy-policy" target="_blank">Privacy Policy</a>

            <!-- donate btn in side menu -->
            <a href="https://secure3.convio.net/sphf/site/Donation2;jsessionid=00000000.app340b?df_id=1480&mfc_pref=T&1480.donation=form1&NONCE_TOKEN=A4F10372DEF9F743AC3BC962CD7F5E4F&_ga=2.146544183.241198011.1497985408-1422913765.1496341390" target="_blank">Donate</a>

        </div>


        <span style="font-size:30px;cursor:pointer" onclick="openNav()"> 
            <img src="images/hamburger.png" class="hamburger" alt="Open side menu" /> 
        </span>

        <!-- SPF Logo - top right corner -->
        <img src="images/spf_logo.png" class="spfLogo" alt="Logo" />

        
        <img src="images/big_title1.png" class="celebrate" alt="Lights of Hope - 20th Anniversary" />


        <!-- List of sounds for star wheel -->
        <audio src="sounds/bigStar.wav" id="bigStar"></audio>
        <audio src="sounds/smallstar1.wav" id="smallStar1"></audio>
        <audio src="sounds/smallstar2.wav" id="smallStar2"></audio>
        <audio src="sounds/smallstar3.wav" id="smallStar3"></audio>
        <audio src="sounds/smallstar4.wav" id="smallStar4"></audio>

        <!-- Big star animation -->
        <div class="container">

            <a href="#wheel" class="wheel-button">
                <span><img src="images/big_star.png" width="100" id="bigstar" onClick="bigStarClick()" alt="Big Star" /></span>
            </a>

            <ul id="wheel" data-angle="all">
                <li class="item">
                    <a href="#home"><img src="images/star3.png" width="52" height="52" onclick="smallStarSound1(); controlLight('star3', 3);" alt="Yellow star" /></a>
                </li>
                <li class="item">
                    <a href="#home"><img src="images/star2.png" width="52" height="52" onclick="smallStarSound2(); controlLight('star2', 2);" alt="Green star" /></a>
                </li>
                <li class="item">
                    <a href="#home"><img src="images/star1.png" width="52" height="52" onclick="smallStarSound3(); controlLight('star1', 1);" alt="Blue star" /></a>
                </li>
                <li class="item">
                    <a href="#home"><img src="images/star4.png" width="52" height="52" onclick="smallStarSound4(); controlLight('star4', 4);" alt="Pink star" /></a>
                </li>
            </ul>
        </div>


        <!-- Hospital image -->
        <img src="images/hospital.png" class="hospital" alt="Hospital Image" />


        <!-- All of the bottom right absolute position stuff together -->
        <div class="bottom-right">
            <!-- donate button -->
            <a href="https://secure3.convio.net/sphf/site/Donation2;jsessionid=00000000.app340b?df_id=1480&mfc_pref=T&1480.donation=form1&NONCE_TOKEN=A4F10372DEF9F743AC3BC962CD7F5E4F&_ga=2.146544183.241198011.1497985408-1422913765.1496341390" target="_blank">
                <img class="donate pull-right" src="images/donate.png" alt="Donate" />
            </a>

            <!-- smaller social media icons -->
            <div data-href="http://104.236.138.127" data-layout="button_count" data-size="large" data-mobile-iframe="false" ><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flightsofhope.helpstpauls.com%2F&amp;src=sdkpreparse">
                <img src="images/fb_small.png" class="fb-btn" alt="FaceBook Share" />
            </a></div>

            <a href="http://twitter.com/intent/tweet?text=I+just+controlled+St.+Paul’s+Foundation’s+Lights+of+Hope+display+with+my+phone,+click+here+and+you+can+too!+http://lightsofhope.com/display+%23LOH2018" target="_blank">
                <img src="images/twitter_sm.png" class="twitter-btn" alt="Twitter Share" />
            </a>
        </div>

        
        <!-- Modal for Login -->
        <div id="myLoginModal" class="modal fade" role="dialog">
            <div class="empty">
            </div>

            <img src="images/login_instruc.png" class="login-instruc" alt="Please enter your name and email to interact with the lights." />

            <div class="modal-dialog login-dialog">

                <!-- Modal for Login content-->
                <div class="modal-content">
                    <div class="modal-header register">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Register</h4>
                    </div>
                    <div class="modal-body login-body">


                        <div class="alert alert-danger" role="alert" data-dismiss="alert" style="display:none">
                            <strong>Please enter a valid name and email.</strong>
                        </div>


                        <form name="login_form" method="POST" onsubmit="return submitCheck()">
                            <div class="form-group">
                                <input id="username" name="name" type="text" class="form-control" placeholder="Name" required>
                                <input id="password" name="email" type="text" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="emailCheck">
                                <input type="checkbox" checked="checked" name="checkBox" value="emailCheck" />
                                Yes, I would like to receive emails from St. Paul's Foundation.
                            </div>

                            <div class="row inputEnd">
                                <div class="col-xs-6">
                                    <div class="g-recaptcha captcha" data-sitekey="6LcaBykUAAAAAJPVSHmOPV6vGwBpszHhq5Z2_0j2" data-callback="recaptchaCallback">
                                    </div>
                                </div>

                                <!-- add 'disabled' to enable captcha -->
                                <div class="col-xs-6">
                                    
                                    <button name="submit" id="submit" type="submit" class="btn btnSubmit">Play!</button>
                                    
                                    <!--
                                    <button name="submit" id="submit" type="submit" class="btn btnSubmit" disabled>Play!</button>
                                    -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    

        <!-- First load instructions -->
        <div class="modal2-bg">
            <img src="images/click_me_instruc.png" class="instruction" alt="" />
        </div>

        <div class="modal3-bg">
            <img src="images/click_me_instruc_2.png" class="instruction2" alt="" />
        </div>
        
        
        <!-- Fire work animations -->
        <div class="modal4-bg">
            <canvas id="canvas"></canvas>
            <canvas id="canvas2"></canvas>
        </div>

        
        
        
        <!-- Modal for about us -->
        <div id="myModal" class="modal fade" role="dialog">
            
            <div class="emptyAbout">
            </div>
            
            <div class="modal-dialog aboutDialog">

                <!-- Modal for about content-->
                <div class="modal-content"> 
                    <div class="modal-header">
                        <img src="images/spf_logo_colour.png" class="aboutUsLogo" alt="St Pauls Foundation Logo" />
                        <h2 class="modal-title aboutTitle">About</h2>
                    </div>
                    <div class="modal-body bodyAbout">

                        <p>Where there is light there is hope. Every holiday season, St. Paul’s Foundation invites the community to support St. Paul’s greatest needs through our Lights of Hope campaign. Your donations help to bring comfort, support and hope to the thousands of British Columbians who rely on St. Paul’s and other Providence Health Care hospitals and residences  for the best possible care. Any gift you can give will make a difference.</p>

                    </div>
                    <div class="modal-footer">
                        <button id="aboutInfo" type="button" class="btn btn-default pull-left" onclick="aboutLink()">More Info</button>
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        
      
        <!-- Storing the login things into the database -->
        <?php
            $name = $_POST["name"];
            $email = $_POST["email"];
            $date = date('m/d/Y h:i:s a', time());
            
            if (isset($_POST["checkBox"])) {
                $check = 1;    
            } else {
                $check = 0;
            }

            $query = "INSERT INTO tuser (email, name, login_time, email_check, retrieved) 
                        VALUES('$email','$name', '$date', $check, 'new')";
            if(isset($email)) {
                mysqli_query($con, $query);
            }
        ?>
  
        
        
        <script type="text/javascript" src="js/site.js"></script>
        <script type="text/javascript" src="js/firework.js"></script>
    </body>
</html>
