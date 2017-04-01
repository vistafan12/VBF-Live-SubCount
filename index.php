<!DOCTYPE html>
<html>
<title>VBF Sub Count</title>
<body>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
body{
    height: 740px;
    background: #b65568;
    background: -webkit-linear-gradient(#b65568, #805199);
    background: -o-linear-gradient(#b65568, #805199);
    background: -moz-linear-gradient(#b65568, #805199);
    background: linear-gradient(#b65568, #805199);
    font-family: 'Roboto', sans-serif;
    color:white;
}
h1.header{
    font-size: 80px;
    text-align: center;
}
h2.header{
    font-size: 40px;
    text-align: center;
}
p.header{
    font-size: 20px;
    text-align: center;
}
table{
    border-radius: 5.1px;
    line-height:1px;
    background-color:#805199;
}
	.subbutton {
	-moz-box-shadow: 0px 1px 0px 0px #f0f7fa;
	-webkit-box-shadow: 0px 1px 0px 0px #f0f7fa;
	box-shadow: 0px 1px 0px 0px #f0f7fa;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #33bdef), color-stop(1, #019ad2));
	background:-moz-linear-gradient(top, #33bdef 5%, #019ad2 100%);
	background:-webkit-linear-gradient(top, #33bdef 5%, #019ad2 100%);
	background:-o-linear-gradient(top, #33bdef 5%, #019ad2 100%);
	background:-ms-linear-gradient(top, #33bdef 5%, #019ad2 100%);
	background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#33bdef', endColorstr='#019ad2',GradientType=0);
	background-color:#33bdef;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #057fd0;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px -1px 0px #5b6178;
}
.subbutton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #019ad2), color-stop(1, #33bdef));
	background:-moz-linear-gradient(top, #019ad2 5%, #33bdef 100%);
	background:-webkit-linear-gradient(top, #019ad2 5%, #33bdef 100%);
	background:-o-linear-gradient(top, #019ad2 5%, #33bdef 100%);
	background:-ms-linear-gradient(top, #019ad2 5%, #33bdef 100%);
	background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#019ad2', endColorstr='#33bdef',GradientType=0);
	background-color:#019ad2;
}
.subbutton:active {
	position:relative;
	top:1px;
}

	</style>
</body>
<h1 class="header">VBF Live Subscriber Count</h1>
<?php
$channelname = $_GET['username'];
$channelidjson = file_get_contents('https://api.vidbitfuture.co/user_to_id.php?username='.$channelname);
$channelid = json_decode($channelidjson,true);
$userinfojson = file_get_contents('https://api.vidbitfuture.co/userinfo.php?id='.$channelid['id']);
$userinfo = json_decode($userinfojson,true);
?>
<html>
    <center><img src="http://vidbitfuture.co/photo/<?php echo $channelid['id']; ?>.jpg"></center>
    <h2 class="header"><?php echo $userinfo['username']; ?></h2>
    <h2 class="subbutton" id="subscribers"><?php echo $userinfo['subcount']; ?></h2>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script>
setInterval(function(){ 
	$.get("subcount.php?userid=<?php echo $channelid['id']; ?>", function(data){
    document.getElementById("subscribers").innerHTML = data; 
	});
}, 2000);
</script>
