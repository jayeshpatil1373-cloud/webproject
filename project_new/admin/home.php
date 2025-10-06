<style>
.card-container {
    display: flex;
    flex-direction: row;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.card {
    cursor: pointer;
    background: #fff;
    border-radius: 12px;
    padding: 30px;
    flex: 1 1 250px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
}

.card h2 {
    font-size: 22px;
    margin-bottom: 10px;
    color: #333;
}

.card p {
    font-size: 18px;
    color: #666;
}

/* Custom colors */
.all {
    border-top: 5px solid #007bff;
}

.upcoming {
    border-top: 5px solid #28a745;
}

.completed {
    border-top: 5px solid #ffc107;
}
</style>
<section id="manage-cars">
    <h1 style="text-align:center; margin-bottom:30px;">Booking Summary</h1>

    <div class="card-container">
        <div class="card all" onClick="location.href='?page=view-booking&subpage=all'">
            <h2>All Bookings</h2>
        </div>
        <div class="card upcoming" onClick="location.href='?page=view-booking&subpage=upcoming'">
            <h2>Upcoming</h2>
        </div>
        <div class="card completed" onclick="location.href='?page=view-booking&subpage=completed'">
            <h2>Completed</h2>
        </div>
    </div>
</section>