<?php
    // Define database connection parameters
    $host = "localhost";    // The hostname or IP address of the MySQL server
    $user = "root";         // The username used to connect to MySQL
    $password = "";         // The password used to connect to MySQL (usually empty for localhost)
    $database = "enrollment-system";     // The name of the MySQL database
    $port = "3306";         // The port number MySQL is listening on (default is 3306)

    // Establish a connection to the MySQL server
    $connection = mysqli_connect($host, $user, $password, $database, $port);

    // Check if there's an error while connecting to the MySQL server
    if(mysqli_connect_error()){
        // If an error occurs, display an error message
        echo "Error: Unable to Connect to MySQL<br>";
        echo "Message: " . mysqli_connect_error() . "<br>";
    }   

    $sql = "SELECT id, first_name, last_name, birth_date, added_date FROM studentregistrationform";
    $result = mysqli_query($connection, $sql);
    
?>   


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment List</title>

</head>
<body>
    <div class="container">
        <h2>Enrollment List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Added Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["first_name"] . "</td>
                                <td>" . $row["last_name"] . "</td>
                                <td>" . $row["birth_date"] . "</td>
                                <td>" . $row["added_date"] . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
                $connection->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>