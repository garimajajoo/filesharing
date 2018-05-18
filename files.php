<!DOCTYPE html>
<html>
<head><title>Home Page</title></head>
<body>
<h1>This is your main page.</h1>
<h2>Here, you can add files, view your files, delete files, and send them to other users.</h2>
<!--taken from class wiki - creates a form to send a file to uploader.php -->
<form enctype="multipart/form-data" action="uploader.php" method="POST">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" />
	</p>
</form>

<?php
session_start();
echo "YOUR DOCUMENTS:" . "<br>";
$full_path = sprintf("/srv/uploads/%s", $_SESSION["username"]);

#eliminating '.' and '..' from the names of our files, code taken in part from W3schools page  on scandir function
$scanned_directory = array_diff(scandir($full_path), array('..', '.'));
foreach($scanned_directory as $filename){


#HTML enteties came from FEIO site (hoping that we did it correctly...)
#in this block of code, we are creating a form to allow the files to be downloaded, deleted, and sent
#forms taken in part from course Wiki
echo sprintf('<form action="view.php" method = "get">
<input type ="hidden" value =%s name="downloadedfile"/>
<label for="download_file">%s</label>
<input class="format" id="download_file" type ="submit" name="viewfile" value=View />
</form>',htmlentities($filename),htmlentities($filename)).sprintf('<form action = "delete.php" method = "get">
<input type ="hidden" value =%s name="deletedfile"/>
<input class="format" id="deleted_file" type ="submit" name="deletefile" value="Delete" />
</form>', htmlentities($filename),htmlentities($filename)).sprintf('<form action ="send.php" method = "get">
<input type ="hidden" value =%s name ="sentfile"/>
<input class="format" id="sent_file" type ="submit" name="sendfile" value="Send"/>
</form>',htmlentities($filename),htmlentities($filename));
}
?>

<!-- allows user to logout of session -->
<br>
<form action = "logout.php" method = "get">
<input type = "hidden" name = "logout" value = "log_out">
<input type = "submit" value = "Logout">
</form>


</body>
</html>
