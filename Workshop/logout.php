<?php
session_start();
session_destroy();
header("location:../workshop_registration.php");
?>