<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <h1>Search Results</h1>

    <p><a href="index.php">Back to Home Page</a></p>

    <?php
    $db = new mysqli("localhost", "root", "mysql", "student_directory");

    if ($db->connect_error) {
        die("Database connection failed: " . htmlspecialchars($db->connect_error));
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lname = $_POST["lname"];

        $stmt = $db->prepare("CALL search_students(?)");
        $stmt->bind_param("s", $lname);
        $stmt->execute();

        $results = $stmt->get_result();

        if ($results->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Email</th>";
            echo "</tr>";

            while ($student = $results->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($student["id"]) . "</td>";
                echo "<td>" . htmlspecialchars($student["first_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($student["last_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($student["email"]) . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No students found.</p>";
        }

        $stmt->close();
    }

    $db->close();
    ?>
</body>
</html>