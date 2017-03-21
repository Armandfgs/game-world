<?php
session_start();

if (isset($_SESSION["admin"]))
{
    unset($_SESSION["admin"]);
}

header("Location: /game-world/admin.php"); /* Redirect browser */
exit();

?>