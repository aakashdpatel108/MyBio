<?php

try {
    // Using PDO (PHP Data Objects)
    $conn = new PDO("sqlsrv:server = tcp:dbforbio.database.windows.net,1433; Database = biodb", "localhost", "Aakash@123");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Using SQL Server Extension (sqlsrv)
    // $serverName = "tcp:dbforbio.database.windows.net,1433";
    // $connectionOptions = array(
    //     "Database" => "biodb",
    //     "Uid" => "your_username_here",
    //     "PWD" => "your_password_here"
    // );
    // $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn) {
        echo "Connected to Azure SQL Database successfully!";
        // You can perform database operations here
    } else {
        echo "Error connecting to Azure SQL Database.";
    }
} catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert data into the database
$sql = "INSERT INTO entry (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
