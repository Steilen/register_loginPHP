<?php
session_start();
session_destroy(); // Destroys the current session
header("Location: index.php"); // Redirect to the main page after logout
exit();
?>
