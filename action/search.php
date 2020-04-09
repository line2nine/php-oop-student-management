<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "../class_lib/Student.php";
    include "../class_lib/StudentManager.php";

    $keyword = $_REQUEST['keyword'];

    $studentManager = new StudentManager("../data/data.json");

    $studentManager->getListStudent();
    $studentManager->searchStudent($keyword);
    var_dump($studentManager->searchStudent($keyword));
}