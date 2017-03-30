<?php
$_GET['userid'] = $userid;
$userinfojson = file_get_contents('https://api.vidbitfuture.co/userinfo.php?id='.$userid);
$userinfo = json_decode($userinfojson,true);
echo $userinfo['subcount'];
?>
