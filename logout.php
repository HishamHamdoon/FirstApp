<?php
session_start();//start session
session_unset();//unset the session data
session_destroy();//destroy the session
header('location:index.php');
exit();
?>