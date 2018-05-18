<?php


$filename = basename($_FILES['uploadedfile']['name']);
if(!preg_match('/^[\w_\.\-]+$/', $filename)){
echo "Invalid filename";
exit;
}

$full_path=sprintf("/srv/uploads/%s/%s", $username,$filename);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
header("Location: upload_success.html");
exit;
}
else{
header("Location: upload_failure.html");
exit;
}
?>
