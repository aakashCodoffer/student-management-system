<?php
    require_once        "../db/db.connection.php";
    class Student {
        private $dbConnection; 
        public function __construct(){
            $db = new Database();
            $this->dbConnection = $db->connect();
        }

        public function getAllStudents(){
            try {
                $query = "SELECT * FROM students";
                $fetchResult = $this->dbConnection->query($query);
                if(!$fetchResult){
                    throw new Exception("Error fetching students: " . $this->dbConnection->error);
                }
                return $fetchResult->fetch_all(MYSQLI_ASSOC);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        public function getStudentById($id){
            try {
                $query = "SELECT * FROM students WHERE id = ". $id;
                $fetchResult = $this->dbConnection->query($query);
                if(!$fetchResult){
                    throw new Exception("Error fetching student by ID: " . $this->dbConnection->error);
                }
                return $fetchResult->fetch_array(MYSQLI_ASSOC);
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        public function addStudent($first_name,$last_name,$age){
            try {
                $query = 'INSERT INTO students (First_Name, Last_Name, age) VALUES ("'.$first_name.'","'.$last_name.'","'.$age.'")';
                $insertResult = $this->dbConnection->query($query);
                if(!$insertResult){
                    throw new Exception("Error adding student: " . $this->dbConnection->error);
                }
                return $this->dbConnection->insert_id; // Return the ID of the newly inserted student;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        public function editStudentDetails($id,$columnNames,$newValue){
            try {
                $query = 'UPDATE students SET '.$columnNames.' = "'.$newValue.'" WHERE id = '.$id;
                $updateResult = $this->dbConnection->query($query);
                if(!$updateResult){
                    throw new Exception("Error updating student details: " . $this->dbConnection->error);
                }
                return true; // Return true if the update was successful
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        public function deleteStudentDetails($id){
            try {
                $query = 'DELETE FROM students WHERE id = '.$id;
                $deleteResult = $this->dbConnection->query($query);
                if(!$deleteResult){
                    throw new Exception("Error deleting student: " . $this->dbConnection->error);
                }
                return true; // Return true if the deletion was successful
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        public function __destruct(){
            if($this->dbConnection){
                $this->dbConnection->close();
            }
        }
    }
?>