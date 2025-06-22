<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

echo "<h2>Admin Panel</h2><a href='logout.php'>Logout</a><br>";

$users = glob("users/*");
foreach ($users as $folder) {
    echo "<hr><h3>User: " . basename($folder) . "</h3>";
    if (file_exists("$folder/details.txt")) {
        echo "<pre>" . file_get_contents("$folder/details.txt") . "</pre>";
        echo "<a href='$folder/details.txt' download>Download Details</a><br>";
    }
    foreach (glob("$folder/*.{jpg,jpeg,png}", GLOB_BRACE) as $img) {
        echo "<img src='$img' width='150'><br>";
    }
}
?>
