<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            top:0;
        }

        .box {
            width: 150px;
            height: 100px;
            background-color: #ffffff;
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .box:hover {
            transform: translateY(-5px);
        }

        .box h2 {
            margin-top: 0;
            font-size: 18px;
            color: #333333;
        }

        .box p {
            margin: 5px 0 0;
            font-size: 24px;
            color: #555555;
            font-weight: bold;
        }

        canvas {
            width: 40px;
            height: 40px;
            margin-right: 20px;
            margin-bottom: 20px;
        }
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
    <?php
    // Establish a connection to your MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fichier";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Function to get the historical data of number of sellers per day
    function getHistoricalSellerData($conn) {
        $historicalData = array();

        // Select the date and count of sellers for each day
        $sql = "SELECT DATE(date_creation) as date, COUNT(*) as count FROM vendeur GROUP BY DATE(date_creation)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch each row and store it in an array
            while ($row = $result->fetch_assoc()) {
                $historicalData[] = array(
                    'date' => $row['date'],
                    'count' => $row['count']
                );
            }
        }

        return $historicalData;
    }

    // Function to get the historical data of number of clients per day
    function getHistoricalClientData($conn) {
        $historicalData = array();

        // Select the date and count of clients for each day
        $sql = "SELECT DATE(date_creation) as date, COUNT(*) as count FROM client GROUP BY DATE(date_creation)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch each row and store it in an array
            while ($row = $result->fetch_assoc()) {
                $historicalData[] = array(
                    'date' => $row['date'],
                    'count' => $row['count']
                );
            }
        }

        return $historicalData;
    }

    // Function to get the historical data of number of colis per day
    function getHistoricalColisData($conn) {
        $historicalData = array();

        // Select the date and count of colis for each day
        $sql = "SELECT DATE(date_creation) as date, COUNT(*) as count FROM colis GROUP BY DATE(date_creation)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch each row and store it in an array
            while ($row = $result->fetch_assoc()) {
                $historicalData[] = array(
                    'date' => $row['date'],
                    'count' => $row['count']
                );
            }
        }

        return $historicalData;
    }

    // Function to get the historical data of number of livreurs per day
    function getHistoricalLivreurData($conn) {
        $historicalData = array();

        // Select the date and count of livreurs for each day
        $sql = "SELECT DATE(date_creation) as date, COUNT(*) as count FROM livreur GROUP BY DATE(date_creation)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch each row and store it in an array
            while ($row = $result->fetch_assoc()) {
                $historicalData[] = array(
                    'date' => $row['date'],
                    'count' => $row['count']
                );
            }
        }

        return $historicalData;
    }

    // Function to calculate the total count from historical data
    function getTotalCount($data) {
        $totalCount = 0;
        foreach ($data as $item) {
            $totalCount += $item['count'];
        }
        return $totalCount;
    }

    // Call the functions to get the historical data for each dataset
    $historicalSellerData = getHistoricalSellerData($conn);
    $historicalClientData = getHistoricalClientData($conn);
    $historicalColisData = getHistoricalColisData($conn);
    $historicalLivreurData = getHistoricalLivreurData($conn);

    // Calculate total counts
    $totalSellers = getTotalCount($historicalSellerData);
    $totalClients = getTotalCount($historicalClientData);
    $totalColis = getTotalCount($historicalColisData);
    $totalLivreurs = getTotalCount($historicalLivreurData);

    // Close the database connection
    $conn->close();
    ?>

    <div class="container">
        <div class="box" id="box1">
            <h2>Total Sellers</h2>
            <p><?php echo $totalSellers; ?></p>
        </div>
        <div class="box" id="box2">
            <h2>Total Clients</h2>
            <p><?php echo $totalClients; ?></p>
        </div>
        <div class="box" id="box3">
            <h2>Total Colis</h2>
            <p><?php echo $totalColis; ?></p>
        </div>
        <div class="box" id="box4">
            <h2>Total Livreurs</h2>
            <p><?php echo $totalLivreurs; ?></p>
        </div>
    </div>

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
    <script>
        var historicalSellerData = <?php echo json_encode($historicalSellerData); ?>;
        var historicalClientData = <?php echo json_encode($historicalClientData); ?>;
        var historicalColisData = <?php echo json_encode($historicalColisData); ?>;
        var historicalLivreurData = <?php echo json_encode($historicalLivreurData); ?>;

        var sellerDates = historicalSellerData.map(data => data.date);
        var sellerCounts = historicalSellerData.map(data => data.count);

        var clientDates = historicalClientData.map(data => data.date);
        var clientCounts = historicalClientData.map(data => data.count);

        var colisDates = historicalColisData.map(data => data.date);
        var colisCounts = historicalColisData.map(data => data.count);

        var livreurDates = historicalLivreurData.map(data => data.date);
        var livreurCounts = historicalLivreurData.map(data => data.count);

        var currentDate = new Date();
        var startDate = new Date(currentDate);
        startDate.setDate(startDate.getDate() - 7);

        var additionalDates = [];

        for (var i = 1; i <= 7; i++) {
            var nextDate = new Date(currentDate);
            nextDate.setDate(nextDate.getDate() + i);
            var formattedDate = nextDate.toISOString().split('T')[0];
            additionalDates.push(formattedDate);
        }

        sellerDates = sellerDates.concat(additionalDates);
        clientDates = clientDates.concat(additionalDates);
        colisDates = colisDates.concat(additionalDates);
        livreurDates = livreurDates.concat(additionalDates);

        var commonOptions = {
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'day',
                        displayFormats: {
                            day: 'YYYY-MM-DD'
                        }
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Date'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    }
                }]
            },
            barPercentage: 0.8
        };

        var sellerCtx = document.getElementById('seller-chart').getContext('2d');
        var clientCtx = document.getElementById('client-chart').getContext('2d');
        var colisCtx = document.getElementById('colis-chart').getContext('2d');
        var livreurCtx = document.getElementById('livreur-chart').getContext('2d');

        var sellerChart = new Chart(sellerCtx, {
            type: 'bar',
            data: {
                labels: sellerDates,
                datasets: [{
                    label: 'Number of Sellers',
                    data: sellerCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: commonOptions
        });

        var clientChart = new Chart(clientCtx, {
            type: 'bar',
            data: {
                labels: clientDates,
                datasets: [{
                    label: 'Number of Clients',
                    data: clientCounts,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: commonOptions
        });

        var colisChart = new Chart(colisCtx, {
            type: 'bar',
            data: {
                labels: colisDates,
                datasets: [{
                    label: 'Number of Colis',
                    data: colisCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: commonOptions
        });

        var livreurChart = new Chart(livreurCtx, {
            type: 'bar',
            data: {
                labels: livreurDates,
                datasets: [{
                    label: 'Number of Livreurs',
                    data: livreurCounts,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: commonOptions
        });
    </script>
</body>
</html>