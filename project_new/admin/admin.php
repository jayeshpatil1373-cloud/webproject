<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tours & Car Booking Admin</title>
    <link rel="stylesheet" href="dashboard.css">

</head>

<body>

    <div class="sidebar">
        <a href="./admin.php" style="text-decoration: none">
            <h2 class="logo">Admin Dashboard</h2>
        </a>
        <nav class="nav-menu">
            <a class="nav-item" href="?page=home">Home</a>
            <a class="nav-item" href="?page=manage-tours">Add Tour</a>
            <!-- <a class="nav-item" href="?page=manege-cars">Manage Cars</a> -->
            <a class="nav-item" href="?page=view-booking">View Booking</a>
        </nav>
        <div class="sidebar-footer">
            <a href="../frontend/logout.php" class="nav-item logout">Logout</a>
        </div>
    </div>

    <div class="main-content">
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        if ($page) {
            include $page . '.php';
        } else {
            echo "<h3>Page not found!</h3>";
        }
        ?>
    </div>

</body>

</html>