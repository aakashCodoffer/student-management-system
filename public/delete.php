<?php
require "../model/student.models.php";
$students = new Student();
$id = $_GET['id'] ?? null;

if ($id) {
   
        $students->deleteStudentDetails($id);
        header("Location: ../index.php");
        exit();
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    echo "<h1>Are you sure you want to delete this student?</h1>";
    
    ?>
</body>
</html>

