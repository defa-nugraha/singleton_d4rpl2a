<?php

require_once 'DatabaseConnection.php';

class Student
{
    private PDO $db;

    public function __construct()
    {
        $this->db = DatabaseConnection::getInstance();
    }

    public function createTable()
    {
        $query = "CREATE TABLE IF NOT EXISTS students (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(100) NOT NULL,
                    email VARCHAR(100) NOT NULL,
                    age INT NOT NULL,
                    major VARCHAR(100) NOT NULL
                )";
        $this->db->exec($query);
        echo "Table 'students' created successfully!<br>";
    }

    public function insertStudent($name, $email, $age, $major)
    {
        $stmt = $this->db->prepare("INSERT INTO students (name, email, age, major) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $age, $major]);
        echo "Student inserted successfully!<br>";
    }

    public function updateStudentEmail($id, $newEmail)
    {
        $stmt = $this->db->prepare("UPDATE students SET email = ? WHERE id = ?");
        $stmt->execute([$newEmail, $id]);
        echo "Student email updated successfully!<br>";
    }

    public function deleteStudent($id)
    {
        $stmt = $this->db->prepare("DELETE FROM students WHERE id = ?");
        $stmt->execute([$id]);
        echo "Student deleted successfully!<br>";
    }

    public function getAllStudents()
    {
        $stmt = $this->db->query("SELECT * FROM students");
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $students;
    }
}
