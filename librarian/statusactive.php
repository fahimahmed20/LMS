<?php
require_once('../dbcon.php');

$res = base64_decode($_GET['id']);

mysqli_query($con, "UPDATE `students` SET `status` = '1' WHERE `id` = '$res' ");
header('location: students.php');