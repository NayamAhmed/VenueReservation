<?php 
include 'pdo_config.php'; 
include 'navbar.php'; 

// Handle month and year selection
$currentMonth = isset($_GET['month']) ? (int)$_GET['month'] : date('m');
$currentYear = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');

if ($currentMonth < 1 || $currentMonth > 12) $currentMonth = date('m');
if ($currentYear < 2000 || $currentYear > 2100) $currentYear = date('Y');

$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
$firstDay = date('w', strtotime("$currentYear-$currentMonth-01"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations Calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
    <div class="calendar-container">
        <h2 class="text-center mb-4">Reservations Calendar</h2>

        <!-- Month and Year Selector -->
        <form method="GET" class="text-center mb-3">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <select name="month" class="form-select">
                        <?php
                        for ($m = 1; $m <= 12; $m++) {
                            $selected = ($m == $currentMonth) ? "selected" : "";
                            echo "<option value='$m' $selected>" . date('F', mktime(0, 0, 0, $m, 1)) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-auto">
                    <select name="year" class="form-select">
                        <?php
                        for ($y = 2000; $y <= 2100; $y++) {
                            $selected = ($y == $currentYear) ? "selected" : "";
                            echo "<option value='$y' $selected>$y</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Change</button>
                </div>
            </div>
        </form>

        <!-- Calendar Table -->
        <table class="table table-bordered calendar-table">
            <thead>
                <tr>
                    <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
                </tr>
            </thead>
            <tbody>
            <?php
$day = 1;
for ($row = 0; $row < 6; $row++) {
    echo "<tr>";
    for ($col = 0; $col < 7; $col++) {
        if ($row == 0 && $col < $firstDay || $day > $daysInMonth) {
            echo "<td></td>";
        } else {
            $date = "$currentYear-$currentMonth-" . str_pad($day, 2, '0', STR_PAD_LEFT);
            $stmt = $pdo->prepare("SELECT name FROM reservations WHERE date = :date");
            $stmt->execute([':date' => $date]);
            $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $resText = "";
            foreach ($reservations as $res) {
                $resText .= "<div class='reservation-info'>{$res['name']}</div>";
            }
            echo "<td><strong>$day</strong><br>$resText</td>";
            $day++;
        }
    }
    echo "</tr>";
    if ($day > $daysInMonth) break;
}
?>

            </tbody>
        </table>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2024 Kofi's Event Venue. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
