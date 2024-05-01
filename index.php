<?php

require_once 'Student.php';

$student = new Student();

$student->createTable();
$student->insertStudent('Defa Nugraha', 'defa-nugraha@gmail.com', 20, 'Rekayasa Perangkat Lunak');

$student->updateStudentEmail(1, 'defa-nugraha@digitalpelajar.com');

$student->deleteStudent(1);

$student->insertStudent('Rosiana Bintang', 'rosiana-bintang@digitalpelajar.com', 19, 'Tadris Bahas Inggris');

$student->insertStudent('Defa Nugraha', 'defa-nugraha@digitalpelajar.com', 20, 'Rekayasa Perangkat Lunak');

$students = $student->getAllStudents();

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Age</th><th>Major</th></tr>";
foreach ($students as $row) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['major'] . "</td>";
    echo "</tr>";
}
echo "</table>";
