<link rel="stylesheet" href="styles/packages.css">
<?php
session_start();
include 'header.php';
include '../db_connect.php';

$sql = "SELECT * FROM packages";
$response = $conn->query($sql);
?>

<section class="packages">
  <section style="text-align: center; padding: 20px; padding: 1.2rem 2rem;">
    <h1>Explore Our Travel Packages</h1>
    <p>
      At <b>Dream Travels</b>, we believe traveling is more than visiting new places—it's about
      creating
      lasting memories.
      Established in 2020, we have been dedicated to offering affordable and unforgettable holiday packages.
      From breathtaking beaches to serene hill stations, from heritage tours to international adventures—we
      bring
      the
      world closer to you.
    </p>
  </section>
  <div class="container">
    <?php
    while ($row = $response->fetch_assoc()) { ?>
      <div class="package">
        <img src=<?php echo $row["image"] ?> alt=<?php echo $row["title"] ?>>
        <div class="package-content">
          <h2><?php echo $row["title"] ?></h2>
          <p><?php echo $row["description"] ?></p>
          <p class="price">₹<?php echo $row["price"] ?> / person</p>
          <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) { ?>
            <a href="book_trip.php?package_id=<?php echo $row["package_id"] ?>" class="btn">Book Now</a>
          <?php } else { ?>
            <a href="login.php" class="btn">Book Now</a>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  </div>
</section>
</main>
<?php
include 'footer.php';
?>