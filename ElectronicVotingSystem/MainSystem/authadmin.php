<?php 
session_start();
if(!isset($_SESSION['usernameAdmin'])){
    header("Location:loginAdmin.php");
    exit();
}
?>