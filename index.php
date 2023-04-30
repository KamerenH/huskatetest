<!DOCTYPE html>
<html>
<head>
    <title>Kameren H's Howard Skate Club DB</title>
    <style>
        {
            width: 500px;
            height: 600px;
        }
    </style>
</head>
<body>
    <h1>Kameren H's Howard Skate Club DB</h1>
    <form method="post">
        <label for="insert_query">Enter SQL Query:</label><br>
        <textarea id="insert_query" name="insert_query"></textarea><br>
        <input type="submit" value="Run on Live DB">
        <input type="reset" value="Start Over">
    </form>
<?php
$host = "hu-skate-club:northamerica-northeast1:husk8teclub";
    $username = "root";
    $password = "bmsql2703";
    $dbname = "skateclub";
// database connection code
                // $con = mysqli_connect('huskateclub connection name', 'database_user', 'database_password','database');
$con = mysqli_connect($host, $username, $password, $dbname);
 // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failure" . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the SQL query from the form
        $sql_query = $_POST["sql_query"];

        // Check if DROP or DELETE statements are included in the query
        if (strpos($sql_query, 'DROP') !== false || strpos($sql_query, 'DELETE') !== false) {
            echo "Error: DROP and DELETE statements are not allowed.";
        } else {
            // Execute the SQL query and display the results
            $result = mysqli_query($con, $sql_query);

            if ($result) {
                echo "<h2>Query Results:</h2>";
                echo "<table border='1'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    foreach ($row as $col) {
                        echo "<td>".$col."</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Error executing query: " . mysqli_error($con);
            }
        }
    }

    // Close the connection
    mysqli_close($con);
    ?>
</body>
</html>
