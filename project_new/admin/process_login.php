<?php
include("../db_connect.php");
if (isset($_POST["email"]) && isset($_POST["password"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $error = "";

  // echo "SELECT * FROM `customers` WHERE email = '".$email."' && password='".$password."'";

  $stmt = $conn->query("SELECT * FROM `customers` WHERE email = '" . $email . "' && password='" . $password . "' && is_admin = 1");

  if (mysqli_num_rows($stmt) > 0) {
    $user = $stmt->fetch_assoc();
    session_start();
    $_SESSION['admin_id'] = $user["cust_id"];
    $_SESSION['admin_name'] = $user["name"];
    $_SESSION['admin_email'] = $user["email"];

    header("location: admin.php");
  } else $error = "Invalid username or password";
}
