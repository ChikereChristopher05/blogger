<?php
include_once("config.php");

if(isset($_GET['uid'])){
    session_destroy();
    header("Location:index.php");
}
?>