<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../index.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <main class="w-full h-screen bg-gray-300">
        <div class="bg-blue-500 p-7 flex justify-between items-center">
            <div class="  ">
                <h1 class="text-5xl font-bold">Student Details System</h1>
            </div>
            <div>
                <a class="px-2.5 outline-none font-semibold  py-2 bg-white rounded-sm hover:bg-gray-300 hover:transition duration-300" href="./create.php" >Add Student</a>
            </div>
        </div>
            <div>
                <!-- Main content showing -->
                 <?php
                    require "../model/student.models.php";
                    $student = new Student();
                   $getAllStudents = $student->getAllStudents();
                   if($getAllStudents){
                          echo "<div class='flex w-full justify-center mt-7'>";
                          echo "<table class='table-fixed w-[70%] shadow-lg  text-left '>";
                          echo "<thead class='font-semibold text-2xl bg-white rounded-2xl p-2'>
                <tr>
                <th class='p-5 rounded-tl-lg'>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Edit</th>
                <th class='rounded-tr-lg'>Delete</th>
                </tr>
            </thead>";
        
            echo "<tbody>";
                          foreach ($getAllStudents as $student) {
                          
                            echo "<tr class='p-2 shadow'>";
                            echo "<td class='font-medium p-4'>" . $student['id'] . "</td>";
                            echo "<td>" . $student['First_Name'] . "</td>";
                            echo "<td>" . $student['Last_Name'] . "</td>";
                            echo "<td>" . $student['age'] . "</td>";
                            echo "<td><a class='px-3 py-1.5 bg-green-500 rounded-sm' href='./edit.php?id=" . $student['id'] . "'>Edit</a></td>";
                            echo "<td><a class=' px-3 py-1.5 bg-red-500 rounded-sm' href='./delete.php?id=" . $student['id'] . "'>Delete</a></td>";
                            echo "</tr>";
                          }
                          echo "</tbody>";
                          echo "</table>";
                          echo "</div>";
                          
                     } else {
                          echo "<p style='padding-top:20px'>No students found.</p>";
        
                          ?>
                            
                            <!-- <a href="./routes/edit.handler.php">Edit Student</a> -->
                          <?php
                   }
                 ?>
            </div>
        
    </main>
</body>
</html>