<?php
session_start();
session_unset();
session_destroy();
header('Location: \sitedamiao\login.php');
exit;
?>
