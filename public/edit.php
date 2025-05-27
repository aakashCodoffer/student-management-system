<?php
require "../model/student.models.php";
$students = new Student();
$id = $_GET['id'] ?? null;
if ($id) {
    $studentDetails = $students->getStudentById($id);
    if (!$studentDetails) {
        echo "Student not found.";
        exit();
    }
} else {
    echo "No student ID provided.";
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $columnValue = $_POST['column'] ?? '';
    $newValue = $_POST['value'] ?? '';
    

    if ($columnValue && $newValue) {
        $students->editStudentDetails($id,$columnValue,$newValue);
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
    <title>EDIT Student</title>
    <link rel="stylesheet" href="../index.css"> 
</head>
<body>
    <h1>Edit Student</h1>
    <form method="POST" action="">
        <label for="column">Select Filed</label>
        <select name="column" id="field">
            <option value="First_Name">First_Name</option>
            <option value="Last_Name">Last_Name</option>
            <option value="age">Age</option>
        </select>
        <input type="text" name="value"  id="">
        <button type="submit">Edit Student</button>
    </form>
    <a href="./index.php">Back to Student List</a>
</body>
</html>