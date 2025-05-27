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
<body class="bg-gray-300 h-full w-full">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
                <div class="bg-blue-500 p-7">
 
                        <h1 class="text-5xl font-bold">Add Student Value</h1>
                    
                </div>
            <div class="flex justify-center items-center h-full w-full pt-10">
                <form method="POST" action="" class="w-[30%] bg-white shadow-lg p-6 rounded-t-xl space-y-3">
                    <div class="">
                    <label class="text-xl font-semibold" for="First_Name">First Name:</label>
                    <input class="border pl-3 rounded-lg py-1 w-full border-gray-300" type="text" id="First_Name" name="First_Name" required>
                    </div>
                    
                    
                    <label class="text-xl font-semibold" for="Last_Name">Last Name:</label>
                    <input class="border pl-3 rounded-lg py-1 w-full border-gray-300" type="text" id="Last_Name" name="Last_Name" required>
                    
                    <label class="text-xl font-semibold" for="age">Age:</label>
                    <input class="pl-3 border rounded-lg py-1 w-full border-gray-300" type="number" id="age" name="age" required>
                    
                    <button class="w-full bg-green-500 py-1 rounded-lg text-xl font-medium" type="submit">Submit</button>
                    <a class="text-sm underline text-gray-700" href="./index.php">Back to Student List</a>
                </form>
                
                </div>
  
    
</body>
</html>