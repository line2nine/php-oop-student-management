<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "../class_lib/Student.php";
    include "../class_lib/StudentManager.php";

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];

    $student = new Student($name, $email, $phone);
    $studentManager = new StudentManager("../data/data.json");
    $studentManager->addStudent($student);
    header("Location: ../index.php");
}