<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kofi's Event Venue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Kofi's Event Venue</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="reservation.php">Reservations</a></li>
                <li class="nav-item"><a class="nav-link" href="calendar.php">Calendar</a></li>
                <li class="nav-item"><a class="nav-link" href="manage.php">Manage Reservation</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="header-image">
    <h1 class="text-center mb-4">Welcome to Kofi's Event Venue</h1>
    <div class="hero-section">
        <div class="text-center text-white">
            <p class="lead">Your dream location for weddings, business events, and parties</p>
            <a href="reservation.php" class="btn btn-primary btn-lg">Reserve Your Spot</a>
        </div>
    </div>
</div>

<br>
<br>

<div class="container section text-center">
    <h2>Our Other Venues</h2>
    <div class="row mt-4 justify-content-center">
        <div class="col-md-4">
            <img src="img/venueChi.webp" class="img-fluid rounded" alt="Chicago's Venue">
            <h5 class="mt-3">Venue 2 - Chicago</h5>
        </div>
        <div class="col-md-4">
            <img src="img/venueSan.webp" class="img-fluid rounded" alt="San Francisco's Venue">
            <h5 class="mt-3">Venue 3 - San Francisco</h5>
        </div>
    </div>
</div>


<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2024 Kofi's Event Venue. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
