<?php
session_start();

#code found on course wiki for sending a file to the browser
$filename = $_GET['downloadedfile'];
$fuller_path = sprintf("/srv/uploads/%s/%s", $_SESSION["username"], $filename);
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mime = $finfo->file($fuller_path);

header("Content-Type: " .$mime);
readfile($fuller_path);

?>
