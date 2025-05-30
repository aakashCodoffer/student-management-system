<?php
    //delete method write in this block
    require "../model/student.models.php";
        $student = new Student();
     $permission = $_GET['delete'] ?? null;
     $deleteStudentId = $_GET['id'] ?? null;
     $pages = $_GET['page'] ?? null || 1;
     $limit = 10;
     $getAllStudents = $student->getAllStudents($pages,$limit);
     $next_page = $pages + 1;
?>

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
                <h1 class="text-5xl font-bold">Student Detail System</h1>
            </div>
            <div class="space-x-2">
                <a class="px-2.5 outline-none font-semibold  py-2 bg-white rounded-sm hover:bg-gray-300 hover:transition duration-300" href="./create.php" >Add Student</a>
            </div>
        </div>
        
        <?php 
            if($permission){
                echo "<div class='flex justify-center mt-5 '>";
                echo "<div class='bg-red-950 w-[70%] py-3 rounded-xl border border-2 border-red-600 flex justify-between items-center px-4'>";
                echo "<p class='text-lg font-bold text-red-300'>Are You Sure To Delete This Row</p>";
                echo "<div class='space-x-4'>
                        <a class='px-2.5 outline-none font-semibold bg-green-500 rounded-sm py-1 hover:bg-green-600 text-white cursor-pointer hover:transition duration-300' href='./delete.php?id=" . $deleteStudentId . "' >OK</a>
                        <a class='px-2.5 outline-none font-semibold bg-red-500 rounded-sm py-1 hover:bg-red-600 text-white cursor-pointer hover:transition duration-300' href='./index.php'>Cancel</a>
                        </div></div>  
                </div>";
            }
        
        ?>
           
                <!-- Main content showing -->
                 <?php
                   
                   if($getAllStudents){
                          echo "<div class='flex w-full justify-center mt-7'>";
                          echo "<table class='table-fixed w-[70%] shadow-lg  text-left '>";
                          echo "<thead class='font-semibold text-2xl bg-white rounded-2xl p-2'>
                <tr>
                <th class='p-5 rounded-tl-lg'>id</th>
                <th>profile</th>
                <th>first name</th>
                <th>last name</th>
                <th>age</th>
                <th>edit</th>
                <th class='rounded-tr-lg'>delete</th>
                </tr>
            </thead>";
        
            echo "<tbody>"; 
                          foreach ($getAllStudents[0] as $student) {
                            echo "<tr class='p-2 shadow'>";
                            echo "<td class='font-medium p-4'>" . $student['id'] . "</td>";
                            echo "<td><img id='preview' class='w-12 mask-cover h-12 rounded-full ' src=".'./media/'.$student["profile"]."></td>";
                            echo "<td>" . $student['first_name'] . "</td>";
                            echo "<td>" . $student['last_name'] . "</td>";
                            echo "<td>" . $student['age'] . "</td>";
                            echo "<td><a  class='px-3 py-1.5 bg-green-500 text-white rounded-sm' href='./edit.php?id=" . $student['id'] . " '>Edit</a></td>";
                            echo "<td><a class='cursor-pointer px-3 py-1.5 bg-red-500 text-white rounded-sm' href='./index.php?delete=true&id=".$student['id']." '>Delete</button></td>";
                            echo "</tr>";
                          }
                          echo "</tbody>";
                          echo "</table>";
                          echo "</div>";
                          
                     } else {
                          echo "<p style='padding-top:20px'>No students found.</p>";
                         
                   }
                 ?>


    <div class="flex space-x-1 justify-center pt-6 ">
        <?php 
            $totalListOfStudent = (int)$getAllStudents[1][0][0];
      
                $totalField = $totalListOfStudent / 10;
                $totalNumberOfPaginationBar = (int)$totalField;
               
                for($i = 1; $i <= $totalNumberOfPaginationBar; $i++){
                    if($totalNumberOfPaginationBar >= 1){
                        echo" <a href='index.php?page=".(int)$i."' class='min-w-9 rounded-md border border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2'>
                                ".$i."
                            </a>";
                    }
                }
         
        ?>
    </div>
            
    </main>

</body>
</html>