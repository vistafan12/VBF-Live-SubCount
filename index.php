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
}</style>
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
    <h2 class="header" id="subscribers"><?php echo $userinfo['subcount']; ?></h2>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script>
setInterval(function(){ 
	$.get("subcount.php?userid=<?php echo $channelid['id']; ?>", function(data){
    document.getElementById("subscribers").innerHTML = data; 
	});
}, 2000);
</script>
