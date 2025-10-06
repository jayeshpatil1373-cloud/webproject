<?php
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patil'S Travels - Explore the World</title>
    <link rel="stylesheet" href="./styles/styles.css" />
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="https://cdn-icons-png.flaticon.com/512/854/854894.png" alt="Travel Logo" class="logo-image">
                <span class="logo-text">Dream Travels</span>
            </div>
            <nav class="navbar">
                <ul class="nav-links">
                    <li><button class="nav-button" onclick="window.location.href='./index.php'">Home</button></li>
                    <li><button class="nav-button" onclick="window.location.href='./about.php'">About</button></li>
                    <li><button class="nav-button" onclick="window.location.href='./packages.php'">Packages</button>
                    </li>
                    <li><button class="nav-button" onclick="window.location.href='./contact.php'">Contact</button></li>
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li><button class="nav-button login-button"
                                onclick="window.location.href='./logout.php'">Logout</button></li>
                    <?php } else { ?>
                        <li><button class="nav-button login-button"
                                onclick="window.location.href='./login.php'">Login</button></li>
                    <?php } ?>
                    <li><button class="nav-button" onclick="window.open('../admin/login.php', '_blank')">Admin
                            Login</button>
                    </li>
                </ul>
                <div class=" menu-toggle">☰
                </div>
            </nav>
        </div>
    </header>
    <main>