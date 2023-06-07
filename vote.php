<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $candidate = $_POST['candidate'];

    $servername = "localhost:3306";
    $username = "root";
    $password = "462999";
    $dbname = "election";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO vote (name, roll_no, vote_to) VALUES ('$name', '$roll', '$candidate')";

    if ($conn->query($sql) === TRUE) {
        require("result.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
