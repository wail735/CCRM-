<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* CSS for chart container */
        .chart-container {
            width: 500px;
            height: 300px;
            margin: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }
    </style>
</head>
<body>
   <div style="display: flex; justify-content: center;">
        <div class="chart-container">
            <canvas id="seller-chart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="client-chart"></canvas>
        </div>
    </div>
    <div style="display: flex; justify-content: center;">
        <div class="chart-container">
            <canvas id="colis-chart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="livreur-chart"></canvas>
        </div>
    </div>

    <?php include 'charts.php'; ?>

   
</body>
</html>