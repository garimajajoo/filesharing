<DOCTYPE! html>
<html>
<head>Sending Page<head/>
<body>
<?php
#starts a session to save filename that wants to be sent
session_start();
$filename=$_GET['sentfile'];
$_SESSION['file']=$filename;
?>
<!-- creates a form for user to select which user they want to send the file to -->
<form action="sender.php" method="POST">
        <label>Enter user to send to: <input type="text" name="user" /></label>
        <input type="submit" value="Send" />
</form>
</body>
<html>
