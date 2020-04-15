<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "../class_lib/Student.php";
    include "../class_lib/StudentManager.php";
    $group = $_REQUEST['group'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $index = $_REQUEST['index'];

    $image = $_FILES['image']['tmp_name'];
    $nameFile = $_FILES['image']['name'];
    $imagePath = "../upload/" . $nameFile;

    $std = [
        "name"  => $name,
        "email" => $email,
        "phone" => $phone,
        "image" => $nameFile,
        "group" => $group
    ];

    $student = new Student($name, $email, $phone, $nameFile, $group);
    $studentManager = new StudentManager("../data/data.json");
    $studentManager->editStudent($index, $std);
    move_uploaded_file($image, $imagePath);
    header("Location: ../index.php");
}