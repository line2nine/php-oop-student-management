<?php
include "class_lib/Student.php";
include "class_lib/StudentManager.php";

$studentManager = new StudentManager("data/data.json");
$students = $studentManager->getListStudent();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Student Management</title>
</head>
<body>
<a href="view/add.php" class="button">Add Student</a>
<label for="keyword"></label><input type="text" id="keyword" name="keyword" placeholder="Search by name">
<a href="action/search.php" class="buttonSearch">SEARCH</a>
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
                <td><?php echo $student->getName() ?></td>
                <td><?php echo $student->getEmail() ?></td>
                <td><?php echo $student->getPhone() ?></td>
                <td><a href="view/edit.php?index=<?php echo $index ?>" class="editBtt">Edit</a>
                    <a onclick="return confirm('Are You Sure?')"
                       href="action/delete.php?index=<?php echo $index ?>" class="delButton">Delete</a>
                </td>
            </tr>

        <?php endforeach; ?>

    <?php endif; ?>
</table>

</body>
</html>
