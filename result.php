<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
</head>
<body>
       <div>
        <?php
            $servername = "localhost:3306";
            $username = "root";
            $password = "462999";
            $dbname = "election";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT vote_to, COUNT(*) as vote_count FROM vote GROUP BY vote_to";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Display the voting results
                echo "<h2>Voting Results:</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Candidate</th><th>Vote Count</th></tr>";
                
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['vote_to'] . "</td>";
                    echo "<td>" . $row['vote_count'] . "</td>";
                    echo "</tr>";
                }
                
                echo "</table>";
            } else {
                echo "No voting results found.";
            }    
       ?>
       </div>

</body>
</html>