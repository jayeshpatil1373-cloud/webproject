<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary-color: #3498db; /* Blue */
            --login-color: #f39c12; /* Orange */
            --dark-text: #34495e;
            --light-bg: #f4f7f6;
        }

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: var(--light-bg);
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            color: var(--primary-color);
            margin-bottom: 25px;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 700;
            color: var(--dark-text);
            font-size: 0.95em;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: var(--login-color);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.0em;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #e67e22;
        }
        
        .link-text a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 700;
        }
        .error{
            color : #fff ;
            padding: 6px 2px;
            background-color: #f56a6aff;
            border-radius: 4px; 
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <?php include("process_login.php") ?>
    <div class="container">
        <h2>User Login 🔑</h2>
        <?php
        if(isset($error) && !empty($error)) {
            echo "<div class='error'>".$error."</div>";   
        }
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn-login">Log In</button>
        </form>

        <p class="link-text" style="margin-top: 20px;">
            <a href="register.php">Don't have an account? Register here.</a>
        </p>
        <p class="link-text">
            <a href="Homepage.html">Back to Home Page</a>
        </p>
    </div>

</body>
</html>