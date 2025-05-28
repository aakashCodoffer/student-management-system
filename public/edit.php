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
<body class="bg-gray-300 h-full w-full">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<div class="bg-blue-500 p-7">
<h1 class="text-5xl font-bold">Edit Student</h1>
</div>
<div class="flex justify-center items-center h-full w-full pt-10">
    <form method="POST" action="" class="w-[30%] bg-white shadow-lg p-6 rounded-t-xl space-y-3">
        <div class="w-full h-full">
        <label class="text-xl font-semibold" for="column">Select Filed</label>
        <select name="column" id="field" class='w-40 border rounded-lg py-1 pl-2 border-gray-300'">
            <option value="First_Name">First_Name</option>
            <option value="Last_Name">Last_Name</option>
            <option value="age">Age</option>
        </select>
        </div>
        
        <input class="border pl-3 rounded-lg py-1 w-full border-gray-300" type="text" name="value"  id="">
        <button class="px-3 py-1.5 bg-green-500 rounded-sm" type="submit">Edit Student</button>
        <a class="block ext-sm underline text-gray-700 text-center" href="./index.php">Back to Student List</a>
    </form>
    
    </div>
</body>
</html>