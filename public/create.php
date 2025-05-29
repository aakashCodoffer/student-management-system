<?php


require "../model/student.models.php";
$students = new Student();  
$error = '';
$imageError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty($_POST['first_name']) && empty($_POST['last_name']) && empty($_POST['age']) || !$_FILES['photo']){
        $error = "Required Filed Not Empty!";
        $imageError = "Required Image File Not Here";
    }else{
        $firstName = $_POST['first_Name'];
        $lastName = $_POST['last_Name'];
        $age = $_POST['age'];
        $profile = $_FILES['photo']['name'];
            if(empty($profile)) {
                $imageError = "Required Image File Not Here";
                
            }
            $fileType = pathinfo($profile,PATHINFO_EXTENSION);
            if(!in_array($fileType,["jpg","png","jpeg"])){
                $imageError = "Not Valid File Type Please Choose [.jpg, .jpeg, .png]";
            } 
            
            else {
                $fileName = uniqid("img_",true) . ".jpg";
                $uploadedImage = move_uploaded_file($_FILES["photo"]["tmp_name"], "./media/".$fileName);
                if ($firstName && $lastName && $age) {
                    $students->addStudent($firstName, $lastName, $age,$fileName);
                    header("Location: ../index.php");
                    exit();
                } 
            }
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
                <form method="POST" enctype="multipart/form-data" action="" autocomplete="off" class="w-[30%] bg-white shadow-lg p-7 rounded-t-xl space-y-3">
                <p id='error' class='text-sm font-medium text-red-500'><?php echo $error ?></p>
                    <label class="text-xl font-semibold" for="First_Name">First Name:</label>
                    <input class="border pl-3 rounded-lg py-1 w-full border-gray-300" type="text" id="First_Name" name="first_Name">
                    
                    <label class="text-xl font-semibold" for="Last_Name">Last Name:</label>
                    <input  class="border pl-3 rounded-lg py-1 w-full border-gray-300" type="text" id="Last_Name" name="last_Name">
                    
                    <label class="text-xl font-semibold" for="age">Age:</label>
                    <input  class="pl-3 border rounded-lg py-1 w-full border-gray-300" type="number" id="age" name="age">
                    <p id='error' class='text-sm font-medium text-red-500'><?php echo $imageError ?></p>
                    <label class="text-xl font-semibold" for="image-uploading">Select Image</label>
                    <input class="border rounded-lg py-1 w-fit border-gray-300 pl-2" type="file" name="photo" accept="image/png, image/jpeg, image/jpg" id="image-uploading">
                    
                    <button class="w-full bg-green-500 cursor-pointer py-1 rounded-lg text-xl font-medium" type="submit">Submit</button>
                    <a class="text-sm underline text-gray-700" href="./index.php">Back to Student List</a>
                </form>
                
                </div>
  
    
</body>
</html>