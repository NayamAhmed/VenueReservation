<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 text-center">
    <h2>Thank You for Your Reservation!</h2>
    <p>Your reservation details are as follows:</p>
    <table class="table table-bordered w-50 mx-auto">
        <tr><th>Name</th><td><?php echo htmlspecialchars($_GET['name']); ?></td></tr>
        <tr><th>Email</th><td><?php echo htmlspecialchars($_GET['email']); ?></td></tr>
        <tr><th>Phone</th><td><?php echo htmlspecialchars($_GET['phone']); ?></td></tr>
        <tr><th>Location</th><td><?php echo htmlspecialchars($_GET['location']); ?></td></tr>
        <tr><th>Date</th><td><?php echo htmlspecialchars($_GET['date']); ?></td></tr>
        <tr><th>Event Type</th><td><?php echo htmlspecialchars($_GET['event_type']); ?></td></tr>
        <tr><th>Amount Paid</th><td>$<?php echo htmlspecialchars($_GET['amount_paid']); ?></td></tr>
        <tr><th>Confirmation Number</th><td><?php echo htmlspecialchars($_GET['cn']); ?></td></tr>
    </table>
    <a href="index.php" class="btn btn-primary mt-3">Back to Home</a>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2024 Kofi's Event Venue. All Rights Reserved.</p>
</footer>
</body>
</html>
