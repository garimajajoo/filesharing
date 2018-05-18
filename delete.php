<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
session_start();
echo "You have deleted the file";
$filename = $_GET['deletedfile'];
#unlink function found on PHP manual
unlink(sprintf("/srv/uploads/%s/%s", $_SESSION["username"],$filename));
?>
<!-- takes users back to homepage for user friendliness -->
<form action=files.php method="GET">
<input type="submit" value="Return to Home Page"/>
</form>
</body>
</html>
