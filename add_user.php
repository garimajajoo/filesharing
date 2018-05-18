<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
#below code creates a new user and writes that user into our txt file. Certain functions taken from php manual
$new_user=$_POST['new'];
$file="users.txt";
$handle=fopen($file, 'a');
fwrite($handle, $new_user);
fwrite($handle,"\n");
#below code creates a directory in the srv folder so files are saved in their username directory
$file_path=sprintf("/srv/uploads/%s",$new_user);
mkdir($file_path,0777,true);
chmod($file_path, 0777);
echo "Congrats! You are now a user!"
#below code sends the new user to his/her home page
?>
<form action=files.php method="GET">
<input type="submit" value="Visit Your Home Page"/>
</form>
</body>
</html>
