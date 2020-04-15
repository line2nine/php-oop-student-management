<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include "../class_lib/Student.php";
    include "../class_lib/StudentManager.php";

    $keyword = $_REQUEST['keyword'];

    $studentManager = new StudentManager("../data/data.json");

    $students = $studentManager->searchStudent($keyword);
    $std = $studentManager->getListStudent();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Student Management</title>
</head>
<body>
<a href="../view/add.php" class="button">Add Student</a>
<form action="../action/search.php" method="post">
    <label for="keyword">
        <input type="text" id="keyword" name="keyword"
               placeholder="Search by name">
    </label>
    <button type="submit" class="buttonSearch">SEARCH</button>
</form>
<table class="TableList">
    <tr>
        <th>STT</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>

    <?php if (isset($students)): ?>

        <?php foreach ($students as $index => $student): ?>
            <tr>
                <td><?php echo $index ?></td>
                <td><?php echo $student->name ?></td>
                <td><?php echo $student->email ?></td>
                <td><?php echo $student->phone ?></td>
                <td><a href="../view/edit.php?index=<?php echo $index ?>"
                       class="editBtt">Edit</a>
                    <a onclick="return confirm('Are You Sure?')"
                       href="../action/delete.php?index=<?php echo $index ?>"
                       class="delButton">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php endif; ?>
</table>

</body>
</html>
