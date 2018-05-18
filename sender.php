<?php
session_start();
#checks if the user typed in a username that has an account
$name = $_POST['user'];
$h=fopen("users.txt","r");
$i=0;
while(!feof($h)){
$l=fgets($h);
if(trim($l)==$name){
$i=1;
}
}
#if username does exist then copies the desired file into the sendee's directory
if($i == 1){
copy(sprintf("/srv/uploads/%s/%s",$_SESSION['username'],$_SESSION['file']),sprintf("/srv/uploads/%s/%s",$name,$_SESSION['file']));
header("Location:send_success.html");
}
#if username does not exist, the user is notified
else{
echo $name. " is not a user Please enter a valid username.";
}
?>




