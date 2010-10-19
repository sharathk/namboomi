<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!-- Include AJAX Framework -->
<!--<script src="ajax/ajax_framework.js" language="javascript"></script> -->
<script type="text/javascript">
/* ---------------------------- */
/* XMLHTTPRequest Enable */
/* ---------------------------- */
function createObject() {
var request_type;
var browser = navigator.appName;
if(browser == "Microsoft Internet Explorer"){
request_type = new ActiveXObject("Microsoft.XMLHTTP");
}else{
request_type = new XMLHttpRequest();
}
return request_type;
}

var http = createObject();


/* -------------------------- */
/* LOGIN */
/* -------------------------- */
/* Required: var nocache is a random number to add to request. This value solve an Internet Explorer cache issue */
var nocache = 0;
function login() {
// Optional: Show a waiting message in the layer with ID ajax_response
document.getElementById('login_response').innerHTML = "Loading..."
// Required: verify that all fileds is not empty. Use encodeURI() to solve some issues about character encoding.
var email = encodeURI(document.getElementById('emailLogin').value);
var psw = encodeURI(document.getElementById('pswLogin').value);
// Set te random number to add to URL request
nocache = Math.random();
// Pass the login variables like URL variable
http.open('get', 'login.php?email='+email+'&psw='+psw+'&nocache = '+nocache);
http.onreadystatechange = loginReply;
http.send(null);
}
function loginReply() {
if(http.readyState == 4){ 
var response = http.responseText;
if(response == 0){
// if login fails
document.getElementById('login_response').innerHTML = 'Login failed! Verify user and password';
// else if login is ok show a message: "Welcome + the user name".
} else {
document.getElementById('login_response').innerHTML = 'Welcome'+response;
}
}
}




</script>

</head>

<body>

<!-- Show Message for AJAX response -->
<div id="login_response"></div>

<!-- Form: the action="javascript:login()"call the javascript function "login" into ajax_framework.js -->
<form action="javascript:login()" method="post">
<input name="emailLogin" type="text" id="emailLogin" value=""/>
<input name="pswLogin" type="password" id="pswLogin" value=""/>
<input type="submit" name="Submit" value="Login"/>
</form>



</body>
</html>