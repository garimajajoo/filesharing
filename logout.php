<?php
#logs the user out of their session. Session destroy function found on PHP manual
session_start();
session_destroy();
header("location: login.html");
?>
