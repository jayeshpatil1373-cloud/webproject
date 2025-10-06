<section id="manage-tours" >
    <h2>Manage Travel Packages (Add)</h2>
    <form action="process_tour.php" method="POST" class="form-grid">
        <div class="form-group">
            <label for="tour_name">Tour Name:</label>
            <input type="text" id="tour_name" name="name" required>
        </div>
        <div class="form-group">
            <label for="tour_destination">Destination:</label>
            <input type="text" id="tour_destination" name="destination" required>
        </div>
            <div class="form-group">
            <label for="tour_price">Price ($):</label>
            <input type="number" id="tour_price" name="price" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="tour_duration">Duration:</label>
            <input type="text" id="tour_duration" name="duration" placeholder="e.g., 7 Days" required>
        </div>
        <div class="form-group full-width">
            <label for="tour_description">Description:</label>
            <textarea id="tour_description" name="description" rows="4" required></textarea>
        </div>
        <div class="form-group full-width">
            <button type="submit" class="btn btn-primary">Add Tour Package</button>
        </div>
    </form>
</section>