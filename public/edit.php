<?php
require "../model/student.models.php";
$students = new Student();
$id = $_GET['id'] ?? null;
$error = "";
$studentDetails = "";
if ($id) {
    $studentDetails = $students->getStudentById($id);
    if (!$studentDetails) {
        echo "Student not found.";
        exit();
    }
} else {
    echo "No student ID provided.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty($_POST['first_name']) && empty($_POST['last_name']) && empty($_POST['age'])){
        $error = 'Required Filed Are Empty !';
    }
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST["age"];
    $profile = $_POST["photo"];
    if($studentDetails['first_name'] !== $first_name){
        $students->editStudentDetails($id,"first_name",$first_name);
        header("Location: ../index.php");
        exit();
    }else if($studentDetails['last_name'] !== $last_name){
        $students->editStudentDetails($id,"last_name",$last_name);
        header("Location: ../index.php");
        exit();
    }else if($studentDetails['age'] !== $age){
        $students->editStudentDetails($id,"age",$age);
        header("Location: ../index.php");
        exit();
    }else if($studentDetails['profile'] !== $profile || isset($_POST['photo'])){
        $students->editStudentDetails($id,"age",$age);
        header("Location: ../index.php");
        exit();
    }
    else{
        $error = 'Values Are Not Modifying !';  
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
            <div class="">
            <p id='error' class='text-sm font-medium text-red-500'><?php echo $error ?></p>
            </div>
                    <p class="block text-lg text-gray-700 ">
                     ID: <?php echo $studentDetails['id'] ?>    
                    </p>
                        <label class='text-xl font-semibold' for='First_Name'>First Name:</label>
                        <input value=<?php echo $studentDetails['first_name'] ?> class='border pl-3 rounded-lg py-1 w-full border-gray-300' type='text' id='First_Name' name='first_name'>
                        
                        <label class='text-xl font-semibold' for='Last_Name'>Last Name:</label>
                        <input value=<?php echo $studentDetails['last_name'] ?> class='border pl-3 rounded-lg py-1 w-full border-gray-300' type='text' id='Last_Name' name='last_name'>
                        
                        <label class='text-xl font-semibold' for='age'>Age:</label>
                        <input value=<?php echo $studentDetails['age'] ?> class='pl-3 border rounded-lg py-1 w-full border-gray-300' type='number' id='age' name='age'>

                        <label class="text-xl font-semibold" for="image-uploading">Select Image: <?php echo $studentDetails['profile'] ?></label>
                        <input  class="border mt-2 rounded-lg py-1 w-fit border-gray-300 pl-2" type="file" name="photo" accept="image/png, image/jpeg, image/jpg" id="image-uploading">
            <button class="px-3 py-1.5 bg-green-500 rounded-sm" type="submit">Edit Student</button>
            <a class="block text-sm underline text-gray-700 text-center" href="./index.php">Back to Student List</a>
        </form>
        
    </div>
</body>
</html>