<?php
session_start();;
#Below code taken directly from course wiki. Enables code to test whether or not a) a filename is valid and b) whether or not a file has been successfully uploaded 
# Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);;
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	header("Location: invalid.html");
	exit;
}

$full_path = sprintf("/srv/uploads/%s/%s", $_SESSION['username'], $filename);

if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	header("Location: upload_success.html");
	exit;
}else{
	header("Location: upload_failure.html");
	exit;
}

?>
