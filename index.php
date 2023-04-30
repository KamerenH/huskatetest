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
    <form method="post" action="index.php">
        <label for="insert_query">Enter SQL Query:</label><br>
        <textarea id="insert_query" name="insert_query"></textarea><br>
        <input type="submit" value="Run on Live DB">
        <input type="reset" value="Start Over">
    </form>
</body>
</html>


<?php
$host = "localhost";
    $username = "root";
    $password = "bmsql2703";
    $dbname = "huskateclub";
// database connection code
                // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('localhost', 'root', '','db_contact');
 // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failure" . mysqli_connect_error());
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the SQL query from the form
    $sql_query = $_POST["sql_query"];

    // Execute the SQL query and display the results
    $result = mysqli_query($conn, $sql_query);

if ($result) {
    echo "<h2>Query Results:</h2>";
    //echo "<table border='1'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $col) {
            echo "<td>".$col."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Error executing query: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
