<?php
require "../model/student.models.php";
$students = new Student();  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //profile setup
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    echo $check[0];
        if($check !== false) {
            $fileName = uniqid("img_",true) . ".jpg";
            $uploadedImage = move_uploaded_file($_FILES["photo"]["tmp_name"], "./media/".$fileName);
                    echo "Your file uploaded successfully.";
                    echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
        $uploadOk = 1;
        } else {
        echo "File is not an image.";
        $uploadOk = 0;
        }

        //user details 
        $firstName = $_POST['first_Name'] ?? '';
        $lastName = $_POST['last_Name'] ?? '';
        $age = $_POST['age'] ?? '';

    if ($firstName && $lastName && $age) {
        $students->addStudent($firstName, $lastName, $age,$fileName);
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
                <form method="POST" enctype="multipart/form-data" action="" class="w-[30%] bg-white shadow-lg p-7 rounded-t-xl space-y-3">
                    
                    <label class="text-xl font-semibold" for="First_Name">First Name:</label>
                    <input  class="border pl-3 rounded-lg py-1 w-full border-gray-300" type="text" id="First_Name" name="first_Name" required>
                    
                    <label class="text-xl font-semibold" for="Last_Name">Last Name:</label>
                    <input  class="border pl-3 rounded-lg py-1 w-full border-gray-300" type="text" id="Last_Name" name="last_Name" required>
                    
                    <label class="text-xl font-semibold" for="age">Age:</label>
                    <input  class="pl-3 border rounded-lg py-1 w-full border-gray-300" type="number" id="age" name="age" required>

                    <label class="text-xl font-semibold" for="image-uploading">Select Image</label>
                    <input required class="border rounded-lg py-1 w-fit border-gray-300 pl-2" type="file" name="photo" id="image-uploading">
                    
                    <button class="w-full bg-green-500 cursor-pointer py-1 rounded-lg text-xl font-medium" type="submit">Submit</button>
                    <a class="text-sm underline text-gray-700" href="./index.php">Back to Student List</a>
                </form>
                
                </div>
  
    
</body>
</html>