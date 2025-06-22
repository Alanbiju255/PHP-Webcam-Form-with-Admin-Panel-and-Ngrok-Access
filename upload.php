<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name   = $_POST['name'] ?? 'unknown';
    $age    = $_POST['age'] ?? '';
    $number = $_POST['number'] ?? '';
    $email  = $_POST['email'] ?? '';
    $imageData = $_POST['image_data'] ?? '';

    if (!$name || !$age || !$number || !$email || !$imageData) {
        die("Missing fields");
    }

    $safeName = preg_replace('/[^a-zA-Z0-9_]/', '_', $name);
    $folder = __DIR__ . "/users/$safeName";
    if (!is_dir($folder)) mkdir($folder, 0777, true);

    // Save details
    file_put_contents("$folder/details.txt", "Name: $name\nAge: $age\nPhone: $number\nEmail: $email\n");

    // Save image
    if (strpos($imageData, 'data:image/png;base64,') === 0) {
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $decodedImage = base64_decode($imageData);
        file_put_contents("$folder/$safeName.png", $decodedImage);
    }

    echo "✅ Data saved for $name";
} else {
    echo "Invalid Request.";
}
