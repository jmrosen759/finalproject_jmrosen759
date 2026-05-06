<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Directory</title>
    <link rel="stylesheet" href="styles/main.css">
    <script src="scripts/main.js" defer></script>
</head>

<body>
    <h1>Student Directory</h1>

    <p>Jacob Rosen</p>
    <p>May 5, 2026</p>

    <form action="search.php" method="POST">
        <label for="lname">Enter a last name:</label>
        <input type="text" id="lname" name="lname" required>

        <input type="submit" value="Search">
    </form>
</body>
</html>