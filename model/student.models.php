<?php
    require_once        "../db/db.connection.php";
    class Student {
        private $dbConnection; 
        public function __construct(){
            $db = new Database();
            $this->dbConnection = $db->connect();
        }

        public function getAllStudents($currentPage = 1,$limit = 2){
            try {
                $start = ($currentPage - 1) * $limit;
                $query = "SELECT * FROM students LIMIT $start, $limit";
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

        public function addStudent($first_name,$last_name,$age,$profile){
            try {
                $query = 'INSERT INTO students (first_name, last_name, age, profile) VALUES ("'.$first_name.'","'.$last_name.'","'.$age.'","'.$profile.'")';
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