<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include "../class_lib/Student.php";
    include "../class_lib/StudentManager.php";

    $index = $_REQUEST['index'];
    $imgName = $_REQUEST['img'];

    $studentManager = new StudentManager("../data/data.json");
    $studentManager->deleteStudent($index, $imgName);
    header("Location: ../index.php");
}