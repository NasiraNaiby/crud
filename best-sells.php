<?php
// Include the database connection
include('connection.php');

// Prepare the SQL query to get best-selling dishes
$sql = "SELECT name, sold_count FROM dishes ORDER BY sold_count DESC";

// Prepare the query
$stmt = $pdo->prepare($sql);

// Execute the query
$stmt->execute();

// Fetch all the results
$dishes = $stmt->fetchAll();

// Prepare the data for Chart.js
$labels = [];
$data = [];

foreach ($dishes as $dish) {
    $labels[] = $dish['name'];
    $data[] = $dish['sold_count'];
}

// Convert PHP arrays to JSON
$labels_json = json_encode($labels);
$data_json = json_encode($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best-Selling Dishes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2>Best-Selling Dishes</h2>
    <canvas id="dishesChart"></canvas>
</div>

<script>
    // PHP data passed into JavaScript variables
    const labels = <?php echo $labels_json; ?>;
    const data = <?php echo $data_json; ?>;
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src = "javascript.js"></script>

</body>
</html>
