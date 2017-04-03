<!DOCTYPE html>
<html>
<title>VBF Sub Count</title>
<body>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
body{
    height: 740px;
    font-family: 'Roboto', sans-serif;
background: #b52424; /* Old browsers */
background: -moz-linear-gradient(left, #b52424 0%, #82181a 50%, #891617 51%, #1c0f0f 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(left, #b52424 0%,#82181a 50%,#891617 51%,#1c0f0f 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to right, #b52424 0%,#82181a 50%,#891617 51%,#1c0f0f 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b52424', endColorstr='#1c0f0f',GradientType=1 ); /* IE6-9 */
}
h1.header{
    font-size: 80px;
    text-align: center;
	color: white
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
if(isset($_GET['username'])){
$channelname = $_GET['username'];
}else{
$channelname = "VBF";
}
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
