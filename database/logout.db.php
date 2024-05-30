<?php

session_start();
session_unset();
session_destroy();
header("location:../include/login.php");
exit();