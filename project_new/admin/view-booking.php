<?php
include("../db_connect.php");

$subpage = $_GET["subpage"] ?? "all";

$query = "SELECT * FROM bookings INNER JOIN customers ON bookings.cust_id = customers.cust_id INNER JOIN packages on bookings.package_id = packages.package_id";

if ($subpage === "upcoming") {
    $query .= " WHERE bookings.start_date > NOW()";
} elseif ($subpage === "completed") {
    $query .= " WHERE bookings.start_date < NOW()";
}

$result = $conn->query($query);

?>

<section id="view-bookings">
    <h2>View All Bookings & Filter</h2>
    <div style="display:flex; gap: 40px;">
        <a class="nav-item" href="?page=view-booking&subpage=all">All</a>
        <a class="nav-item" href="?page=view-booking&subpage=completed">Completed Bookings</a>
        <a class="nav-item" href="?page=view-booking&subpage=upcoming">Upcoming Bookings</a>
    </div>

    <div class="report-table-container">
        <table class="report-table">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Pakage</th>
                    <th>Price</th>
                    <th>Dusation</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                                    <td>' . $row["name"] . '</td>
                                    <td>' . $row["email"] . '</td>
                                    <td>' . $row["title"] . '</td>
                                    <td>' . $row["price"] . '</td>
                                    <td>' . $row["duration"] . '</td>
                                    <td>' . $row["start_date"] . '</td>
                                </tr>';
                }
                ?>
            </tbody>
            <!-- <tbody>
                        <tr><td>B001</td><td>Alice J.</td><td>Paris Adventure Tour</td><td>Tour</td><td>2023-10-20</td><td>Confirmed</td></tr>
                        <tr><td>B002</td><td>Bob S.</td><td>Luxury SUV (Audi Q5)</td><td>Car</td><td>2023-11-01</td><td>Pending</td></tr>
                        <tr><td>B003</td><td>Charlie L.</td><td>Rome Historical Tour</td><td>Tour</td><td>2023-12-05</td><td>Confirmed</td></tr>
                        <tr><td>B004</td><td>Diana M.</td><td>Economy Sedan (Civic)</td><td>Car</td><td>2024-01-15</td><td>Confirmed</td></tr>
                    </tbody> -->
        </table>
    </div>
</section>