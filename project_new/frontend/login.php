<link rel="stylesheet" href="styles/login.css">

<?php
include "header.php";
include "../db_connect.php";
$error = "";
$success = "";

if (isset($_POST) && !empty($_POST)) {
    $type = $_POST['type'];

    if ($type == 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM customers WHERE email = '$username' AND password = '$password'";
        echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            session_start();
            $_SESSION['user_id'] = $user["cust_id"];
            $_SESSION['name'] = $user["name"];
            $_SESSION['email'] = $user["email"];
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    } elseif ($type == 'signup') {

        // Process signup
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $check_sql = "SELECT * FROM customers WHERE email = '$email'";
        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            $error = "Email already registered. Please use another email.";
        } else {
            $sql = "INSERT INTO customers (name, email, phone, password)
    VALUES ('" . $name . "','" . $email . "','" . $phone . "','" . $password . "')";

            if ($conn->query($sql) === TRUE) {
                $success = "New user created successfully";
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

?>
<main>
    <div class="container">
        <!-- Login Form -->
        <div class="form-box active" id="loginBox">
            <h2>Login</h2>
            <div class="success"><?php echo $success ?></div>
            <div class="error"><?php echo $error ?></div>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Enter Username" required>
                <input type="password" name="password" placeholder="Enter Password" required>
                <input type="hidden" name="type" value="login">
                <button type="index.html">Login</button>
            </form>
            <p>Don't have an account? <a onclick="showSignup()">Sign up</a></p>
        </div>

        <!-- Signup Form -->
        <div class="form-box" id="signupBox">
            <h2>Sign Up</h2>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="text" name="phone" placeholder="Phone number" required>
                <input type="password" name="password" placeholder="Choose Password" required>
                <input type="hidden" name="type" value="signup">
                <button type="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a onclick="showLogin()">Login</a></p>
        </div>

    </div>

</main>
<script>
    function showSignup() {
        document.getElementById("loginBox").classList.remove("active");
        document.getElementById("signupBox").classList.add("active");
    }

    function showLogin() {
        document.getElementById("signupBox").classList.remove("active");
        document.getElementById("loginBox").classList.add("active");
    }
</script>
<?php
include "footer.php";
?>