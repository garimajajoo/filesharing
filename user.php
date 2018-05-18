<!DOCTYPE html>
<html>
<head><title>Home Page</title></head>


<body><?php
session_start();
#taking in username that user inputted and turning it into a session variable
$username = $_POST['username'];

$_SESSION['username']=$username;
$h=fopen("users.txt","r");
#functions for below action came from PHP manual linked on class wiki
$i=0;
while(!feof($h)){
$l=fgets($h);
if(trim($l)==$username){
$i=1;
}
}
if($i==1){
#user exists, directs to homepage
header("Location: files.php");
exit;
}else{
#user doesn't exist, takes to user creation page
header("Location:create_user.html");
}
?>

</body>
</html>

