<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "users");

if ($conn) {
    echo "Connected Successfully";
} else {
    echo "Failed";
}
?>