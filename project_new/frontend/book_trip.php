<link rel="stylesheet" href="styles/book_trip.css">

<?php
include "header.php";
include '../db_connect.php';

$package_id = isset($_GET['package_id']) ? $_GET['package_id'] : 1;

$package_sql = "SELECT * FROM packages where package_id = $package_id";
$pack_res = $conn->query($package_sql);

$user_sql = "SELECT * FROM customers where cust_id = " . $_SESSION['user_id'];
$user_res = $conn->query($user_sql);

$pack_row = $pack_res->fetch_assoc();
$user_row = $user_res->fetch_assoc();

if (isset($_POST) && !empty($_POST)) {
    $travellers = $_POST['travellers'];
    $startdate = $_POST['startdate'];
    $package_id = $pack_row['package_id'];
    $cust_id = $_SESSION['user_id'];

    echo "INSERT INTO bookings (cust_id, package_id, travelers, start_date) VALUES ($cust_id, $package_id, '$travellers', '$startdate')";

    $insert_sql = "INSERT INTO bookings (cust_id, package_id, travelers, start_date) VALUES ($cust_id, $package_id, '$travellers', '$startdate')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "<script>alert('Booking successful!'); window.location.href='index.php';</script>";
        exit();
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
}

?>
<main>
    <div class="payment-container">
        <div style="text-align: center;">
            <img style="border-radius: 8px;" width="300px" src=<?php echo $pack_row["image"] ?>
                alt=<?php echo $pack_row["title"] ?>>
            <h2>Book Your Trip to <br /> <?php echo $pack_row["title"] ?></h2>
        </div>
        <!-- <h2>Payment Gateway</h2> -->
        <form action="" method="POST">
            <label for="fullname">Full Name</label>
            <input type="text" readonly value=<?php echo $user_row["name"]; ?> id="fullname" name="name"
                placeholder="Enter your name" required>

            <label for="email">Email</label>
            <input type="email" readonly id="email" value=<?php echo $user_row["email"]; ?> name="email"
                placeholder="Enter your email" required>

            <label for="travellers">No of Travellers</label>
            <input type="text" id="travellers" value="" name="travellers" placeholder="No of travelers" required>

            <label for="startdate">Start Date</label>
            <input type="date" id="startdate" value="" name="startdate" placeholder="Start Date" required>

            <label for="amount">Amount (₹)</label>
            <input type="number" value=<?php echo $pack_row["price"]; ?> readonly id="amount" name="amount"
                placeholder="Enter amount" required>

            <label>Pay via UPI</label>
            <img src="images/qr.png" alt="UPI" style="width:200px; vertical-align: middle;">

            <button type="submit" class="pay-btn">Book Now</button>
            <!-- <p class="secure-text">🔒 Secure Payment Powered by Patil's Travels</p> -->
        </form>
    </div>
</main>
<script>
    // Show/Hide payment fields based on selected method
    const paymentRadios = document.querySelectorAll("input[name='payment_method']");
    const cardDetails = document.getElementById("card-details");
    const upiDetails = document.getElementById("upi-details");
    const bankDetails = document.getElementById("bank-details");

    paymentRadios.forEach(radio => {
        radio.addEventListener("change", () => {
            cardDetails.style.display = radio.value === "card" ? "block" : "none";
            upiDetails.style.display = radio.value === "upi" ? "block" : "none";
            bankDetails.style.display = radio.value === "netbanking" ? "block" : "none";
        });
    });
</script>

<?php
include "footer.php";
?>