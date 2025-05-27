<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../index.css">
</head>
<body>
    <main>
        <div class="container">
            <div class="header">
                <h1>Student Details System</h1>
            </div>
            <div class="content">
                <p>Welcome to the Student Details System. Here you can manage student information.</p>
            </div>
            <div>
            <a href="./create.php">Add Student</a>
                <!-- Main content showing -->
                 <?php
                    require "../model/student.models.php";
                    $student = new Student();
                   $getAllStudents = $student->getAllStudents();
                   if($getAllStudents){
                          echo "<table class='student-table'>";
                          echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Age</th><th>edit</th><th>delete</th></tr>";
                        
                          foreach ($getAllStudents as $student) {
    
                            echo "<tr>";
                            echo "<td>" . $student['id'] . "</td>";
                            echo "<td>" . $student['First_Name'] . "</td>";
                            echo "<td>" . $student['Last_Name'] . "</td>";
                            echo "<td>" . $student['age'] . "</td>";
                            echo "<td><a href='./edit.php?id=" . $student['id'] . "'>Edit</a></td>";
                            echo "<td><a href='./delete.php?id=" . $student['id'] . "'>Delete</a></td>";
                            echo "</tr>";
                          }
                          echo "</table>";
                     } else {
                          echo "<p style='padding-top:20px'>No students found.</p>";
        
                          ?>
                            <a href="./create.php">Add Student</a>
                            <!-- <a href="./routes/edit.handler.php">Edit Student</a> -->
                          <?php
                   }
                 ?>
            </div>
        </div>
    </main>
</body>
</html>