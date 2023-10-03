<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>
<body>
    <h2>Add Employee</h2>
    <form action="add_process.php" method="post" action="add_process.php">
        Full Name: <input type="text" name="fullname" required><br>
        Email: <input type="email" name="email" required><br>
        Phone: <input type="phone" name="phone" required><br>
        Introduce: <textarea name="introduce" required rows="4" cols="5"></textarea><br>
        <input type="submit" value="Add Employee">
    </form>
</body>
</html>