// controls for the CueServer output
window.requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimation;
var timeUntilPlay = 0;
var count = 0;
var timer;
var timer2, timer3;
var star;
var msg_num;

var SCREEN_WIDTH = window.innerWidth,
    SCREEN_HEIGHT = window.innerHeight,
    mousePos = {
        x: 400,
        y: 300
    };

// create canvas
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d'),
    particles = [],
    rockets = [],
    MAX_PARTICLES = 400,
    colorCode = 0;

function countDown() {
    setTimeout(function() {
        count--;
        if (count < 0) {  
            context.clearRect(0, 0, window.innerWidth, window.innerHeight);    
            clearInterval(timer2);
            cancelAnimationFrame(timer);
            cancelAnimationFrame(timer3);
            $('.modal4-bg').fadeOut();
            count = 0;
            document.getElementById("bigstar").click();
            return null;
        } else {
            timer = requestAnimationFrame(countDown);
        }
    }, 1000);
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
    return "";
}

// Controls the light signals
function controlLight(star, msg_id) {
    if(!getCookie("user")) {
        document.getElementById("btnLogin").click();
    } else {
		msg_num = msg_id;
        var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    count = this.responseText - 1;
                    
                    $('.modal4-bg').fadeIn();
                    drawCanvas(star);

                    timer3 = requestAnimationFrame(loop);
                    timer = requestAnimationFrame(countDown);
                    
                } else if (this.readyState == 4 && ((this.status > 399 && this.status < 600) || this.status === 0)) {
                    alert("Servers are down, please try again later. :)");
                }
                
            };
        
        xhttp.open("POST", "http://104.236.138.127:8888", true);
        xhttp.send(star);
    }
}

// firework canvas
function drawCanvas(star_img) {
    canvas.width = SCREEN_WIDTH;
    canvas.height = SCREEN_HEIGHT;

    star = new Image();

    star.src = "images/" + star_img + ".png";

    timer2 = setInterval(launch, 2500);
};

// update mouse position
$(document).mousemove(function(e) {
    e.preventDefault();
    mousePos = {
        x: e.clientX,
        y: e.clientY
    };
});

// launch more rockets!!!
$(document).mousedown(function(e) {
    for (var i = 0; i < 5; i++) {
        launchFrom(Math.random() * SCREEN_WIDTH * 2 / 3 + SCREEN_WIDTH / 6);
    }
});

function launch() {
    launchFrom(mousePos.x);
}

function launchFrom(x) {
    if (rockets.length < 3) {
        var rocket = new Rocket(x);
        rocket.explosionColor = Math.floor(Math.random() * 360 / 10) * 10;
        rocket.vel.y = Math.random() * - 3 - 4;
        rocket.vel.x = Math.random() * 6 - 3;
        rocket.size = 8;
        rocket.shrink = 0.999;
        rocket.gravity = 0.01;
        rockets.push(rocket);
    }
}

function loop() {
    // update screen size
    if (SCREEN_WIDTH != window.innerWidth) {
        canvas.width = SCREEN_WIDTH = window.innerWidth;
    }
    if (SCREEN_HEIGHT != window.innerHeight) {
        canvas.height = SCREEN_HEIGHT = window.innerHeight;
    }

    // clear canvas
    context.clearRect(0, 0, window.innerWidth, window.innerHeight);
    context.drawImage(star, SCREEN_WIDTH/ 2 - 50, SCREEN_HEIGHT/2 - 50, 100, 100);

    // draw the count down text
    context.fillStyle = "white";
    
    // Responsive countdown text
    var fontSize = (SCREEN_WIDTH * 0.08) | 0;
    context.font = '900 ' + fontSize + 'px Calibri';
    context.textAlign = "center";

    if (count > 0) {
		var x_pos = SCREEN_WIDTH * 0.5;
		var y_pos = SCREEN_HEIGHT * 0.67;
		if (msg_num === 1) {
			context.fillText(count.toString() + " seconds until the 20th", x_pos, y_pos);
			context.fillText("Anniversary letters twinkle!", x_pos, y_pos + (10 * (SCREEN_WIDTH * 0.01)));
		} else if (msg_num === 2) {
			context.fillText(count.toString() + " seconds until the", x_pos, y_pos);
            context.fillText("strobe lights go off!", x_pos, y_pos + (10 * (SCREEN_WIDTH * 0.01)));
		} else if (msg_num === 3) {
			context.fillText(count.toString() + " seconds until the", x_pos, y_pos);
            context.fillText("mini archway stars flash!", x_pos, y_pos + (10 * (SCREEN_WIDTH * 0.01)));
		} else { // msg_num === 4
			context.fillText(count.toString() + " seconds until the", x_pos, y_pos);
            context.fillText("red rope lights flicker!", x_pos, y_pos + (10 * (SCREEN_WIDTH * 0.01)));
		}
	} 
    
    // draw rockets
    var existingRockets = [];

    for (var i = 0; i < rockets.length; i++) {
        // update and render
        rockets[i].update();
        //rockets[i].render(context);

        // calculate distance with Pythagoras
        var distance = Math.sqrt(Math.pow(mousePos.x - rockets[i].pos.x, 2) + Math.pow(mousePos.y - rockets[i].pos.y, 2));

        // random chance of 1% if rockets is above the middle
        var randomChance = rockets[i].pos.y < (SCREEN_HEIGHT * 2 / 3) ? (Math.random() * 100 <= 1) : false;

        /* Explosion rules
        - 80% of screen
        - going down
        - close to the mouse
        - 1% chance of random explosion
        */
        
        if (rockets[i].pos.y < SCREEN_HEIGHT / 5 || rockets[i].vel.y >= 0 || distance < 50 || randomChance) {
            rockets[i].explode();
        } else {
            existingRockets.push(rockets[i]);
        }
    }

    rockets = existingRockets;
    
    var existingParticles = [];

    for (var i = 0; i < particles.length; i++) {
        particles[i].update();

        // render and save particles that can be rendered
        if (particles[i].exists()) {
            particles[i].render(context);
            existingParticles.push(particles[i]);
        }
    }

    // update array with existing particles - old particles should be garbage collected
    particles = existingParticles;

    while (particles.length > MAX_PARTICLES) {
        particles.shift();
    }
    timer3 = requestAnimationFrame(loop);
}

function Particle(pos) {
    this.pos = {
        x: pos ? pos.x : 0,
        y: pos ? pos.y : 0
    };
    this.vel = {
        x: 0,
        y: 0
    };
    this.shrink = .97;
    this.size = 2;

    this.resistance = 1;
    this.gravity = 0;

    this.flick = false;

    this.alpha = 1;
    this.fade = 0;
    this.color = 0;
}

Particle.prototype.update = function() {
    // apply resistance
    this.vel.x *= this.resistance;
    this.vel.y *= this.resistance;

    // gravity down
    this.vel.y += this.gravity;

    // update position based on speed
    this.pos.x += this.vel.x;
    this.pos.y += this.vel.y;

    // shrink
    this.size *= this.shrink;

    // fade out
    this.alpha -= this.fade;
};

Particle.prototype.render = function(c) {
    if (!this.exists()) {
        return;
    }

   // c.save();

    c.globalCompositeOperation = 'lighter';

    var x = this.pos.x,
        y = this.pos.y,
        r = this.size / 2;

    var gradient = c.createRadialGradient(x, y, 0.1, x, y, r);
    gradient.addColorStop(0.1, "rgba(255,255,255," + this.alpha + ")");
    gradient.addColorStop(0.8, "hsla(" + this.color + ", 100%, 50%, " + this.alpha + ")");
    gradient.addColorStop(1, "hsla(" + this.color + ", 100%, 50%, 0.1)");

    c.fillStyle = gradient;

    c.beginPath();
    c.arc(this.pos.x, this.pos.y, this.flick ? Math.random() * this.size : this.size, 0, Math.PI * 2, true);
    c.closePath();
    c.fill();
    
    //c.restore();
};

Particle.prototype.exists = function() {
    return this.alpha >= 0.1 && this.size >= 1;
};

function Rocket(x) {
    Particle.apply(this, [{
        x: x,
        y: SCREEN_HEIGHT}]);

    this.explosionColor = 0;
}

Rocket.prototype = new Particle();
Rocket.prototype.constructor = Rocket;

Rocket.prototype.explode = function() {
    var count = Math.random() * 10 + 80;

    for (var i = 0; i < count; i++) {
        var particle = new Particle(this.pos);
        var angle = Math.random() * Math.PI * 2;

        // emulate 3D effect by using cosine and put more particles in the middle
        var speed = Math.cos(Math.random() * Math.PI / 2) * 15;

        particle.vel.x = Math.cos(angle) * speed;
        particle.vel.y = Math.sin(angle) * speed;

        particle.size = 10;

        particle.gravity = 0.2;
        particle.resistance = 0.92;
        particle.shrink = Math.random() * 0.05 + 0.93;

        particle.flick = true;
        particle.color = this.explosionColor;

        particles.push(particle);
    }
};

Rocket.prototype.render = function(c) {
    if (!this.exists()) {
        return;
    }
    //c.clearRect(0, 0, window.innerWidth, window.innerHeight);
    //c.save();

    c.globalCompositeOperation = 'lighter';

    var x = this.pos.x,
        y = this.pos.y,
        r = this.size / 2;

    var gradient = c.createRadialGradient(x, y, 0.1, x, y, r);
    gradient.addColorStop(0.1, "rgba(255, 255, 255 ," + this.alpha + ")");
    gradient.addColorStop(1, "rgba(0, 0, 0, " + this.alpha + ")");

    c.fillStyle = gradient;

    c.beginPath();
    c.arc(this.pos.x, this.pos.y, this.flick ? Math.random() * this.size / 2 + this.size / 2 : this.size, 0, Math.PI * 2, true);
    c.closePath();
    c.fill();
    
    //c.restore();
};
