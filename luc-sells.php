<?php
// Include the database connection
include('connection.php');

// Prepare the SQL query to get best-selling dishes and their prices
$sql = "SELECT name, price, sold_count FROM dishes ORDER BY sold_count DESC";

// Prepare the query
$stmt = $pdo->prepare($sql);

// Execute the query
$stmt->execute();

// Fetch all the results
$dishes = $stmt->fetchAll();

// Prepare data for the Pie chart
$labels = [];
$data = [];
$revenues = [];

foreach ($dishes as $dish) {
    $revenue = $dish['price'] * $dish['sold_count'];
    $labels[] = $dish['name'];
    $data[] = $revenue;
    $revenues[] = $revenue;
}

// Find the most profitable dish
$maxRevenue = max($revenues);
$maxDishIndex = array_search($maxRevenue, $revenues);
$maxDish = $dishes[$maxDishIndex]['name'];
$maxDishRevenue = $maxRevenue;

// Convert PHP arrays to JSON
$labels_json = json_encode($labels);
$data_json = json_encode($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Plat le Plus Rémunérateur</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* Custom styles to position the chart and description side by side */
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 50px;
        }

        .chart-container {
            width: 40%;
            padding: 20px;
        }

        .info-container {
            width: 55%;
            padding: 20px;
        }

        .dish-info {
            margin-bottom: 20px;
        }

        .color-legend {
            list-style-type: none;
            padding: 0;
        }

        .color-legend li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .color-legend .color-box {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="info-container">
        <h2 class="dish-info">The Most Profitable Dish:</h2>
        <p class="dish-info"><strong><?php echo $maxDish; ?></strong> with revenue: <strong>$<?php echo $maxDishRevenue; ?></strong></p>

        <ul class="color-legend">
            <?php foreach ($dishes as $index => $dish): ?>
                <li>
                    <div class="color-box" style="background-color: <?php echo $colors[$index]; ?>;"></div>
                    <span><?php echo $dish['name']; ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="chart-container">
        <canvas id="revenueChart"></canvas>
    </div>
</div>

<!-- Pass PHP data to JavaScript -->
<script>
    // PHP data passed into JavaScript variables
    const labels = <?php echo $labels_json; ?>;
    const data = <?php echo $data_json; ?>;

    // Create the pie chart
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels, // Dish names
            datasets: [{
                data: data, // Revenues
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(50, 205, 50, 0.7)',
                    'rgba(255, 69, 0, 0.7)',
                    'rgba(138, 43, 226, 0.7)',
                    'rgba(255, 20, 147, 0.7)',
                ], // Random colors for each slice
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(50, 205, 50, 1)',
                    'rgba(255, 69, 0, 1)',
                    'rgba(138, 43, 226, 1)',
                    'rgba(255, 20, 147, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        boxWidth: 20,
                        padding: 15
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return '$' + tooltipItem.raw.toFixed(2);
                        }
                    }
                }
            }
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
