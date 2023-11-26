import { parseResponseCode } from "./networking.js";

function login() {
	document.getElementById("final").innerHTML = "";
	var xHTML = new XMLHttpRequest();
	xHTML.onload = function () {
		var response_code = this.responseText;
		var responseName = parseResponseCode(response_code)
		document.getElementById("final").innerHTML = "Code: "+ response_code + " " + responseName;
	}
	var user = document.getElementById("username").value;
    var pass = document.getElementById("password").value;
	
	//this is *100%* unsecure, NEVER do this on a non-local server settup, but we want something working, not necessarily secure.
	xHTML.open("POST", "./responses/loginattempt.php");
	xHTML.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xHTML.send("user="+user+"&pass="+pass);
}

export {login};