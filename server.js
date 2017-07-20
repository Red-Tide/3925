const http = require('http');
//Raspberry Pi for Testing and presentation

const cmd = require('node-cmd');
//const req = require('request-promise');

//Interval of time between lights signals
const time = 10;

//Constants for sending get requests to CueServer
const star1 = {
	method: 'GET',
	uri:'http://remote.eosligthmedia.com:8083/exe.cgi?cmd=m12'
}

const star2 = {
	method: 'GET',
	uri:'http://remote.eosligthmedia.com:8083/exe.cgi?cmd=m13'
}

const star3 = {
	method: 'GET',
	uri:'http://remote.eosligthmedia.com:8083/exe.cgi?cmd=m14'
}

const star4 = {
	method: 'GET',
	uri:'http://remote.eosligthmedia.com:8083/exe.cgi?cmd=m15'
}

var queue = [];
var send = "";
var ready = true;
var count = 0;

//cmd.run('./setup.sh');


function ready_state_enable() {
	ready = true;
}

function count_up() {
	count += 1;
	console.log(count.toString());
	if (count >= time) {
		count = 0;
	}
}

function snd_command() {
	if (queue.length > 0 && ready) {
		send = queue.shift().toString();
	    console.log("Dequeuing " + send);

	
		switch (send) {
			case "star1":
			//req(star1);
			cmd.run('./pattern1.sh');
			break;

			case "star2":
			cmd.run('./pattern2.sh');
			//req(star2);
			break;

			case "star3":
			cmd.run('./pattern3.sh');
			//req(star3);
			break;

			case "star4":
			cmd.run('./pattern4.sh');
			//req(star4);
			break;

			default:
			console.log("Invalid Command")
		}
		ready = false;
		count = 0;
		setTimeout(ready_state_enable, time * 1000);
	}
}

function onRequest (request, response) {
	let body = [];
	request.on('data', (data) => {
		console.log("Request!");
		body.push(data);
	}).on('end',() => {
		body = Buffer.concat(body).toString();
		if (!ready || queue > 0) {
			//response.write(queue.toString() + " " + (queue.length * time + (time - count)).toString() + " seconds\n");
			response.write((queue.length * time + (time - count)).toString() + " ");
		} else {
			//response.write(queue.toString() + " " + "0" + " seconds\n");
			response.write("0");

		}
		queue.push(body);
		response.end();
	});
}