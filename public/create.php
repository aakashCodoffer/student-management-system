<?php
require "../model/student.models.php";
$students = new Student();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['First_Name'] ?? '';
    $lastName = $_POST['Last_Name'] ?? '';
    $age = $_POST['age'] ?? '';

    if ($firstName && $lastName && $age) {
        $students->addStudent($firstName, $lastName, $age);
        header("Location: ../index.php");
        exit();
    } else {
        echo "All fields are required.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="../index.css"> 
</head>
<body>
    <h1>Add New Student</h1>
    <form method="POST" action="">
        <label for="First_Name">First Name:</label>
        <input type="text" id="First_Name" name="First_Name" required>
        
        <label for="Last_Name">Last Name:</label>
        <input type="text" id="Last_Name" name="Last_Name" required>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        
        <button type="submit">Add Student</button>
    </form>
    <a href="./index.php">Back to Student List</a>
</body>
</html>