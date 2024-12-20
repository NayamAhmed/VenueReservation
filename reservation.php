<?php
include 'pdo_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $event_type = $_POST['event_type'];
    $amount_paid = $_POST['amount_paid'];
    $card_number = $_POST['card_number'];
    $confirmation_number = uniqid('RES');

    try {
        $sql = "INSERT INTO reservations (name, email, phone, location, date, event_type, amount_paid, confirmation_number)
                VALUES (:name, :email, :phone, :location, :date, :event_type, :amount_paid, :confirmation_number)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':location' => $location,
            ':date' => $date,
            ':event_type' => $event_type,
            ':amount_paid' => $amount_paid,
            ':confirmation_number' => $confirmation_number
        ]);

        header("Location: thankyou.php?cn=$confirmation_number&name=$name&email=$email&phone=$phone&location=$location&date=$date&event_type=$event_type&amount_paid=$amount_paid");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations - Kofi's Event Venue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function updatePrice() {
            const locationPrices = { "New York": 500, "Chicago": 400, "San Francisco": 600 };
            const eventPrices = { "Wedding": 5000, "Bar Mitzvah": 3000, "Concert": 7000, "Business Event": 4000 };

            const location = document.getElementById("location").value;
            const eventType = document.getElementById("event_type").value;

            const totalPrice = locationPrices[location] + eventPrices[eventType];
            document.getElementById("amount_paid").value = totalPrice;
        }
    </script>
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Make a Reservation</h2>
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Location</label>
            <select name="location" id="location" class="form-control" onchange="updatePrice()">
                <option value="New York">New York</option>
                <option value="Chicago">Chicago</option>
                <option value="San Francisco">San Francisco</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Event Type</label>
            <select name="event_type" id="event_type" class="form-control" onchange="updatePrice()">
                <option value="Wedding">Wedding</option>
                <option value="Bar Mitzvah">Bar Mitzvah</option>
                <option value="Concert">Concert</option>
                <option value="Business Event">Business Event</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Amount to Pay ($)</label>
            <input type="text" name="amount_paid" id="amount_paid" class="form-control" readonly>
        </div>
        <h4 class="mt-4">Payment Details</h4>
        <div class="mb-3">
            <label>Credit Card Number</label>
            <input type="text" name="card_number" class="form-control" maxlength="16" placeholder="1234 5678 9012 3456" required>
        </div>
        <button type="submit" class="btn btn-success">Submit Reservation</button>
    </form>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2024 Kofi's Event Venue. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.onload = updatePrice;
</script>
</body>
</html>
