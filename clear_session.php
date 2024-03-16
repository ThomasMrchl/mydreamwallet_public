<?php
session_start();
if (isset($_POST['clear_session'])) {
    session_unset();
    header("Location:signup.php");
}
?>