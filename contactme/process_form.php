<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:dbforbio.database.windows.net,1433; Database = biodb", "localhost", "Aakash@123");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
// $connectionInfo = array("UID" => "localhost", "pwd" => "Aakash@123", "Database" => "biodb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
// $serverName = "tcp:dbforbio.database.windows.net,1433";
// $conn = sqlsrv_connect($serverName, $connectionInfo);

// $servername = "localhost";  // Replace with your MySQL server name (usually "localhost" if it's on the same machine)
// $username = "root";         // MySQL username
// $password = ""; // MySQL password (the one you set during installation)
// $database = "biodb";    // Your MySQL database name

// // Create connection
// $conn = new mysqli($servername, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

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
