<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Kofi's Event Venue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-5 text-center">
    <h2>Our Beautiful Venues</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <img src="img/ny.jpg" class="img-fluid rounded clickable-image" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-src="img/ny.jpg" alt="Venue 1">
            <h5 class="mt-3">Venue 1 - New York</h5>
        </div>
        <div class="col-md-4">
            <img src="img/chi.jpg" class="img-fluid rounded clickable-image" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-src="img/chi.jpg" alt="Venue 2">
            <h5 class="mt-3">Venue 2 - Chicago</h5>
        </div>
        <div class="col-md-4">
            <img src="img/sanf.jpg" class="img-fluid rounded clickable-image" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-src="img/sanf.jpg" alt="Venue 3">
            <h5 class="mt-3">Venue 3 - San Francisco</h5>
        </div>
    </div>
    <br><br>
    <h2>Different Events</h2>
    <div class="row mt-4">
        <div class="col-md-4">
            <img src="img/wedding.webp" class="img-fluid rounded clickable-image" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-src="img/wedding.webp" alt="Wedding">
            <h5 class="mt-3">Weddings</h5>
        </div>
        <div class="col-md-4">
            <img src="img/bar.jpg" class="img-fluid rounded clickable-image" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-src="img/bar.jpg" alt="Bar Mitzvah">
            <h5 class="mt-3">Bar Mitzvah</h5>
        </div>
        <div class="col-md-4">
            <img src="img/concer.jpg" class="img-fluid rounded clickable-image" data-bs-toggle="modal" data-bs-target="#imageModal" data-bs-src="img/concer.jpg" alt="Concert">
            <h5 class="mt-3">Music Concert</h5>
        </div>
    </div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modal-image" src="" class="img-fluid" alt="Enlarged Image">
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2024 Kofi's Event Venue. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const images = document.querySelectorAll('.clickable-image');
    const modalImage = document.getElementById('modal-image');

    images.forEach(img => {
        img.addEventListener('click', () => {
            const src = img.getAttribute('data-bs-src');
            modalImage.src = src;
        });
    });
</script>
</body>
</html>
