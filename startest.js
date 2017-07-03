
window.onload = function(){
    var canvas = document.getElementById("canvas");
    var ctx = canvas.getContext("2d");  
    var star = new Image();
    star.src = "image/big_star.png";
    star.onload = function(){
        draw(this, 0, 0);
    };

    function draw(obj, x, y){
        
        //ctx.drawImage(obj,0,0,400,400);
        //ctx.clearRect(0, 0, canvas.width, canvas.height);
        //ctx.save();
        ctx.translate(10,0);
        ctx.drawImage(obj, x, y, 400, 400);
        //ctx.restore();
        setTimeout(draw(obj, x, y), 100);
    }
        
    
    
    //setInterval(draw,1000);

};











function makeSmoke() {
    x += 5 + (Math.random() * 10);
    y -= 5;
    z += 0.5;
    u += 2;
    v += 2;
    
    ctx.clearRect(0, 0, 500, 500);
    
    drawHouse();
    
    ctx.beginPath();
    ctx.arc(x, y, u, 0, Math.PI * 2, false);
    ctx.closePath();
    ctx.fillStyle = smokeColor[Math.floor(z)];
    ctx.fill();
    
    ctx.beginPath();
    ctx.arc(x + v, y + 7, u - 3, 0, Math.PI * 2, false);
    ctx.closePath();
    ctx.fillStyle = smokeColor[Math.floor(z)];
    ctx.fill();
    
    ctx.beginPath();
    ctx.arc(x - v, y + 7, u - 2, 0, Math.PI * 2, false);
    ctx.closePath();
    ctx.fillStyle = smokeColor[Math.floor(z)];
    ctx.fill();
    
    if (y <= 0) {
        x = 325;
        y = 100;
        z = 0;
        u = 4;
        v = 10;
    }
}

function updateRange(rng) {
    animation = rng.value;
    clearInterval(makeSmokeI);

    makeSmokeI = setInterval(makeSmoke, rng.value);
}

// -----------------------
// House Coordinates Below
// -----------------------
function drawHouse() {
//sky
    ctx.beginPath();
    ctx.moveTo(0, 0);
    ctx.lineTo(500, 0);
    ctx.lineTo(500, 500);
    ctx.lineTo(0, 500);

    ctx.closePath();
    ctx.strokeStyle = "#BAFFFF";
    ctx.stroke();
    ctx.fillStyle = "#BAFFFF";
    ctx.fill();

//grass
    ctx.beginPath();
    ctx.moveTo(0, 300);
    ctx.lineTo(500, 300);
    ctx.lineTo(500, 500);
    ctx.lineTo(0, 500);

    ctx.closePath();
    ctx.strokeStyle = "#46AB4D";
    ctx.stroke();
    ctx.fillStyle = "#46AB4D";
    ctx.fill();

//chimney front face
    ctx.beginPath();
    ctx.moveTo(330, 200);
    ctx.lineTo(330, 103);
    ctx.lineTo(340, 100);
    ctx.lineTo(340, 200);

    ctx.closePath();
    ctx.strokeStyle = "#CCCCCC";
    ctx.stroke();
    ctx.fillStyle = "#CCCCCC";
    ctx.fill();

//chimney left face
    ctx.beginPath();
    ctx.moveTo(330, 200);
    ctx.lineTo(330, 103);
    ctx.lineTo(320, 100);
    ctx.lineTo(320, 200);

    ctx.closePath();
    ctx.strokeStyle = "#525252";
    ctx.stroke();
    ctx.fillStyle = "#525252";
    ctx.fill();

//chimney top face
    ctx.beginPath();
    ctx.moveTo(320, 100);
    ctx.lineTo(330, 98);
    ctx.lineTo(340, 100);
    ctx.lineTo(330, 103);

    ctx.closePath();
    ctx.strokeStyle = "#000000";
    ctx.stroke();
    ctx.fillStyle = "#000000";
    ctx.fill();

//left face wall
    ctx.beginPath();
    ctx.moveTo(220, 240);
    ctx.lineTo(70, 200);
    ctx.lineTo(70, 400);
    ctx.lineTo(220, 460);

    ctx.closePath();
    ctx.strokeStyle = "#525252";
    ctx.stroke();
    ctx.fillStyle = "#525252";
    ctx.fill();

//left face roof
    ctx.beginPath();
    ctx.moveTo(230, 125);
    ctx.lineTo(60, 200);
    ctx.lineTo(220, 240);

    ctx.closePath();
    ctx.strokeStyle = "#96030D";
    ctx.stroke();
    ctx.fillStyle = "#96030D";
    ctx.fill();

//right face wall
    ctx.beginPath();
    ctx.moveTo(220, 240);
    ctx.lineTo(405, 205);
    ctx.lineTo(405, 410);
    ctx.lineTo(220, 460);

    ctx.closePath();
    ctx.strokeStyle = "#CCCCCC";
    ctx.stroke();
    ctx.fillStyle = "#CCCCCC";
    ctx.fill();

//right face roof
    ctx.beginPath();
    ctx.moveTo(230, 125);
    ctx.lineTo(420, 205);
    ctx.lineTo(220, 240);

    ctx.closePath();
    ctx.strokeStyle = "#FF0000";
    ctx.stroke();
    ctx.fillStyle = "#FF0000";
    ctx.fill();

//window1 outer
    ctx.beginPath();
    ctx.moveTo(238, 253);
    ctx.lineTo(277, 246);
    ctx.lineTo(277, 300);
    ctx.lineTo(238, 307);
    ctx.closePath();
    ctx.strokeStyle = "#000000";
    ctx.stroke();
    ctx.fillStyle = "#000000";
    ctx.fill();

//window1 inner
    ctx.beginPath();
    ctx.moveTo(240, 255);
    ctx.lineTo(275, 248);
    ctx.lineTo(275, 298);
    ctx.lineTo(240, 305);
    ctx.closePath();
    ctx.strokeStyle = "#DCE34F";
    ctx.stroke();
    ctx.fillStyle = "#DCE34F";
    ctx.fill();

//window2 outer
    ctx.beginPath();
    ctx.moveTo(338, 236);
    ctx.lineTo(377, 229);
    ctx.lineTo(377, 283);
    ctx.lineTo(338, 290);
    ctx.closePath();
    ctx.strokeStyle = "#000000";
    ctx.stroke();
    ctx.fillStyle = "#000000";
    ctx.fill();

//window2 inner
    ctx.beginPath();
    ctx.moveTo(340, 238);
    ctx.lineTo(375, 231);
    ctx.lineTo(375, 281);
    ctx.lineTo(340, 288);
    ctx.closePath();
    ctx.strokeStyle = "#DCE34F";
    ctx.stroke();
    ctx.fillStyle = "#DCE34F";
    ctx.fill();

//left face foyer wall
    ctx.beginPath();
    ctx.moveTo(228, 440);
    ctx.lineTo(270, 460);
    ctx.lineTo(270, 480);
    ctx.lineTo(228, 460);

    ctx.closePath();
    ctx.strokeStyle = "#525252";
    ctx.stroke();
    ctx.fillStyle = "#525252";
    ctx.fill();

//left face foyer wall
    ctx.beginPath();
    ctx.moveTo(228, 440);
    ctx.lineTo(270, 460);
    ctx.lineTo(270, 480);
    ctx.lineTo(228, 460);

    ctx.closePath();
    ctx.strokeStyle = "#525252";
    ctx.stroke();
    ctx.fillStyle = "#525252";
    ctx.fill();

//top face foyer wall
    ctx.beginPath();
    ctx.moveTo(228, 440);
    ctx.lineTo(270, 460);
    ctx.lineTo(340, 442);
    ctx.lineTo(330, 435);
    ctx.lineTo(270, 450);
    ctx.lineTo(243, 437);

    ctx.closePath();
    ctx.strokeStyle = "#8C8C8C";
    ctx.stroke();
    ctx.fillStyle = "#8C8C8C";
    ctx.fill();

//pillar1 front face
    ctx.beginPath();
    ctx.moveTo(275, 455);
    ctx.lineTo(275, 360);
    ctx.lineTo(285, 360);
    ctx.lineTo(285, 452);

    ctx.closePath();
    ctx.strokeStyle = "#FFFFFF";
    ctx.stroke();
    ctx.fillStyle = "#FFFFFF";
    ctx.fill();

//pillar1 left face
    ctx.beginPath();
    ctx.moveTo(275, 455);
    ctx.lineTo(275, 360);
    ctx.lineTo(270, 355);
    ctx.lineTo(270, 452);

    ctx.closePath();
    ctx.strokeStyle = "#525252";
    ctx.stroke();
    ctx.fillStyle = "#525252";
    ctx.fill();

//pillar2 front face
    ctx.beginPath();
    ctx.moveTo(325, 443);
    ctx.lineTo(325, 348);
    ctx.lineTo(335, 348);
    ctx.lineTo(335, 440);

    ctx.closePath();
    ctx.strokeStyle = "#FFFFFF";
    ctx.stroke();
    ctx.fillStyle = "#FFFFFF";
    ctx.fill();

//pillar2 left face
    ctx.beginPath();
    ctx.moveTo(325, 443);
    ctx.lineTo(325, 348);
    ctx.lineTo(320, 343);
    ctx.lineTo(320, 440);

    ctx.closePath();
    ctx.strokeStyle = "#525252";
    ctx.stroke();
    ctx.fillStyle = "#525252";
    ctx.fill();


//right face lower-roof
    ctx.beginPath();
    ctx.moveTo(225, 325);
    ctx.lineTo(280, 360);
    ctx.lineTo(450, 320);
    ctx.lineTo(405, 290);

    ctx.closePath();
    ctx.strokeStyle = "#FF0000";
    ctx.stroke();
    ctx.fillStyle = "#FF0000";
    ctx.fill();

//right face lower-roof, underside
    ctx.beginPath();
    ctx.moveTo(225, 325);
    ctx.lineTo(280, 360);
    ctx.lineTo(450, 320);
    ctx.lineTo(450, 325);
    ctx.lineTo(280, 365);
    ctx.lineTo(225, 340);

    ctx.closePath();
    ctx.strokeStyle = "#8C8C8C";
    ctx.stroke();
    ctx.fillStyle = "#8C8C8C";
    ctx.fill();

//front face foyer wall
    ctx.beginPath();
    ctx.moveTo(270, 460);
    ctx.lineTo(270, 480);
    ctx.lineTo(340, 462);
    ctx.lineTo(340, 442);

    ctx.closePath();
    ctx.strokeStyle = "#CCCCCC";
    ctx.stroke();
    ctx.fillStyle = "#CCCCCC";
    ctx.fill();

//door
    ctx.beginPath();
    ctx.moveTo(365, 420);
    ctx.lineTo(365, 360);
    ctx.lineTo(395, 352);
    ctx.lineTo(395, 414);

    ctx.closePath();
    ctx.strokeStyle = "#FFFFFF";
    ctx.stroke();
    ctx.fillStyle = "#FFFFFF";
    ctx.fill();
}
