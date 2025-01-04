<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['firstname']) || (trim($_SESSION['id']) == '')) {
    header("location: login.php");
    exit();
}
