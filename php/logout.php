<?php
session_start();

session_unset();

session_destroy();

header("Location: /game-world/index.php"); /* Redirect browser */
exit();

?>