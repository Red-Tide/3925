// Set the wheel animation
$(document).ready(function(){
    $(".wheel-button").wheelmenu({
        trigger: "click",
        animation: "fly",
        animationSpeed: "slow"
    });
});

// Load facebook SDK for JS
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

// Function to set the cookie
function setCookie(c_name, value, expiredays) {
    var exdate = new Date()
    exdate.setDate(exdate.getDate() + expiredays)
    document.cookie = c_name+ "=" + escape(value) +
    ((expiredays==null) ? "" : ";expires=" + exdate.toUTCString())
}

// Function to get the cookie
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
    return "";
}

// to check & validate the form
function submitCheck(){

    var nameRegExp = /^[A-Za-z]([A-Za-z]|-| )+[A-Za-z]$/; 
    var emailRegExp = /([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/;

    var name = document.forms["login_form"]["name"].value;
    var email = document.forms["login_form"]["email"].value;
    
    var expiryTime = 1; // 1 day for now, if there is time, make work with 30 min

    if (!(nameRegExp.test(name) && emailRegExp.test(email))) {

        $('.alert').css("display", "block");
        document.forms["login_form"]["name"].value = "";
        document.forms["login_form"]["email"].value = "";
        return false;

    } else {

        setCookie("user", "default", expiryTime); // want 30 min
        return true;
        
    }
}


$('#close').click(function () {
    $('.modal-bg').fadeOut();
    $('.loginModal').fadeOut();
    return false;
});

function closeBlank(){
    $('.modal2-bg').fadeOut();
    $('.modal3-bg').fadeIn();

}

function closeBlank2(){
    $('.modal3-bg').fadeOut();
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
    }
}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
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
    if(getCookie("instruction")){
        $('.modal3-bg').fadeOut();
    }
    else{
        $('.modal2-bg').fadeOut();
        $('.modal3-bg').fadeIn();
        setCookie("instruction", "instructionValue", 200);
    }
}

// Small star sounds
function smallStarSound1() {
    document.getElementById("smallStar1").play();
}

function smallStarSound2() {
    document.getElementById("smallStar2").play();
}

function smallStarSound3() {
    document.getElementById("smallStar3").play();
}

function smallStarSound4() {
    document.getElementById("smallStar4").play();
}

function aboutLink() {
    window.open("http://helpstpauls.com/about");
}

// captcha call back function
function recaptchaCallback() {
    $('#submit').removeAttr('disabled');
}