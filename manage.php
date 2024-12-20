<?php 
include 'pdo_config.php'; 
include 'navbar.php'; 

$reservation = null;

if (isset($_POST['search'])) {
    $confirmation_number = $_POST['confirmation_number'];
    $query = "SELECT * FROM reservations WHERE confirmation_number = '$confirmation_number'";
    $stmt = $pdo->prepare("SELECT * FROM reservations WHERE confirmation_number = :confirmation_number");
    $stmt->execute([':confirmation_number' => $confirmation_number]);
    
    if ($stmt->rowCount() > 0) {
        $reservation = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $error = "No reservation found with that confirmation number.";
    }
    
}

// Handle cancellation
if (isset($_POST['cancel'])) {
    $confirmation_number = $_POST['confirmation_number'];
    $pdo->query("DELETE FROM reservations WHERE confirmation_number = '$confirmation_number'");
    $success = "Your reservation has been successfully canceled.";
    $reservation = null;
}

// Handle update
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $event_type = $_POST['event_type'];
    $amount_paid = $_POST['amount_paid'];
    $confirmation_number = $_POST['confirmation_number'];

    $pdo->query("UPDATE reservations SET name='$name', email='$email', phone='$phone', location='$location', date='$date', event_type='$event_type', amount_paid='$amount_paid' WHERE confirmation_number='$confirmation_number'");
    $success = "Your reservation has been updated.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Manage Your Reservation</h2>

    <!-- Search Form -->
    <form method="POST" class="mb-4">
        <div class="input-group">
            <input type="text" name="confirmation_number" class="form-control" placeholder="Enter Confirmation Number" required>
            <button class="btn btn-primary" name="search">Search</button>
        </div>
    </form>

    <!-- Display Errors or Success Messages -->
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

    <!-- Display Reservation Details -->
    <?php if ($reservation): ?>
    <form method="POST">
        <input type="hidden" name="confirmation_number" value="<?php echo $reservation['confirmation_number']; ?>">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $reservation['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $reservation['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $reservation['phone']; ?>">
        </div>
        <div class="mb-3">
            <label>Location</label>
            <select name="location" class="form-control">
                <option <?php if ($reservation['location'] == 'New York') echo 'selected'; ?>>New York</option>
                <option <?php if ($reservation['location'] == 'Chicago') echo 'selected'; ?>>Chicago</option>
                <option <?php if ($reservation['location'] == 'San Francisco') echo 'selected'; ?>>San Francisco</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="<?php echo $reservation['date']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Event Type</label>
            <select name="event_type" class="form-control">
                <option <?php if ($reservation['event_type'] == 'Wedding') echo 'selected'; ?>>Wedding</option>
                <option <?php if ($reservation['event_type'] == 'Bar Mitzvah') echo 'selected'; ?>>Bar Mitzvah</option>
                <option <?php if ($reservation['event_type'] == 'Concert') echo 'selected'; ?>>Concert</option>
                <option <?php if ($reservation['event_type'] == 'Business Event') echo 'selected'; ?>>Business Event</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Amount Paid ($)</label>
            <input type="text" name="amount_paid" class="form-control" value="<?php echo $reservation['amount_paid']; ?>" readonly>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update Reservation</button>
        <button type="submit" name="cancel" class="btn btn-danger">Cancel Reservation</button>
    </form>
    <?php endif; ?>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2024 Kofi's Event Venue. All Rights Reserved.</p>
</footer>
</body>
</html>
