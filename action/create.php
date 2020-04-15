<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "../class_lib/Student.php";
    include "../class_lib/StudentManager.php";

    $group = $_REQUEST['group'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];

    $image = $_FILES['image']['tmp_name'];
    $nameFile = $_FILES['image']['name'];
    $imagePath = "../upload/" . $nameFile;
    move_uploaded_file($image, $imagePath);

    $student = new Student($name, $email, $phone, $nameFile, $group);
    $studentManager = new StudentManager("../data/data.json");
    $studentManager->addStudent($student);
    header("Location: ../index.php");
}