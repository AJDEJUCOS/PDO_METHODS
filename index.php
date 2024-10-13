<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vehicle Maintenance</title>
        <style>
		table, th, td {
			width: 500px;
			border: 1px solid black;
		}
	</style>
    </head>
    <body>
        <!--<pre>
        <?php
        //prepares the query that will be used to get the data
        $stmt = $pdo->prepare("SELECT first_name, last_name, make, model FROM owners JOIN vehicles ON 
        owners.owner_id = vehicles.owner_id");

        //once the sql query executes, the data will be presented
        if ($stmt->execute()) {
            print_r($stmt->fetchAll());
        }
        ?>
        </pre>-->
        
        <!--<pre>
        <?php
        //prepare the query that will find the email addresses of owners and service centers.
        $stmt = $pdo->prepare("SELECT email FROM owners UNION SELECT email FROM service_centers");

        //the data will be presented once the query is executed 
        if ($stmt->execute()) {
            print_r($stmt->fetch());
        }
        ?>
        </pre>-->

        <!--<?php
        //store the query in a variable
        $query = "INSERT INTO vehicles VALUES (?,?,?,?,?,?,?,?);";

        $stmt = $pdo->prepare($query);

        //specify the values to be put on the placeholder in the query
        $executeQuery = $stmt->execute(
            [11, 11, 'Nissan', 'Patrol', 2001, 'QWERTYAJKCFF97161', 6900, '2000-10-19']
        );
        
        //checks whether the query was executed and displays an output depending on the result
        if ($executeQuery) {
            echo "Query Succesful";
        } else {
            echo "Query Failed";
        }
        ?>-->

        <!--<?php
        //store the query in a variable
        $query = "DELETE FROM vehicles WHERE vehicle_id = 4;";

        //prepare the query to be executed
        $stmt = $pdo->prepare($query);

        //execute the query
        $executeQuery = $stmt->execute();
        
        //checks whether the query was executed and displays an output depending on the result
        if ($executeQuery) {
            echo "Deletion Succesful";
        } else {
            echo "Query Failed";
        }
        ?>-->

        <!--<?php
        //store the query in a variable
        $query = "UPDATE owners SET last_name = ? WHERE owner_id = 6";

        //prepare the query to be executed
        $stmt = $pdo->prepare($query);

        //specify the value to be updated
        $executeQuery = $stmt->execute(
            ["Medina"]
        );

        //check whether the query was successfully executed
        if ($executeQuery) {
            echo "Update successful!";
        } else {
            echo "Query failed";
        }
        ?>-->

<?php

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// SQL query to fetch data from the Vehicles table
$sql = "SELECT vehicle_id, make, model, year, vin_number, current_mileage, last_service_date FROM Vehicles";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all results
$vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Vehicle List</h1>

<table>
    <thead>
        <tr>
            <th>Vehicle ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>VIN Number</th>
            <th>Current Mileage</th>
            <th>Last Service Date</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($vehicles)): ?>
            <?php foreach ($vehicles as $vehicle): ?>
                <tr>
                    <td><?php echo htmlspecialchars($vehicle['vehicle_id']); ?></td>
                    <td><?php echo htmlspecialchars($vehicle['make']); ?></td>
                    <td><?php echo htmlspecialchars($vehicle['model']); ?></td>
                    <td><?php echo htmlspecialchars($vehicle['year']); ?></td>
                    <td><?php echo htmlspecialchars($vehicle['vin_number']); ?></td>
                    <td><?php echo htmlspecialchars($vehicle['current_mileage']); ?></td>
                    <td><?php echo htmlspecialchars($vehicle['last_service_date']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No vehicles found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>