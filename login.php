<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $creds = json_decode(file_get_contents("admin/creds.json"), true);
    if ($_POST['username'] === $creds['username'] && $_POST['password'] === $creds['password']) {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit;
    } else {
        echo "Invalid login.";
    }
}
?>

<form method="POST">
  <h2>Admin Login</h2>
  <input type="text" name="username" placeholder="Username" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button type="submit">Login</button>
</form>
