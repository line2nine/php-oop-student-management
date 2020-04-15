<?php
include "../class_lib/Student.php";
include "../class_lib/StudentManager.php";
include "../class_lib/GroupManager.php";

$groupName = $_REQUEST['group'];
$studentManager = new StudentManager("../data/data.json");
$groupManager = new GroupManager($studentManager);
$students = $groupManager->getGroupStudents($groupName);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Group Students</title>
</head>
<body>
<a href="../view/add.php" class="button">Add Student</a>
<form action="../action/search.php" method="get">
    <label for="keyword">
        <input type="text" id="keyword" name="keyword"
               placeholder="Search by name">
    </label>
    <button type="submit" class="buttonSearch">SEARCH</button>
</form>
<table class="TableList">
    <tr>
        <th>STT</th>
        <th>Group</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Image</th>
        <th>Action</th>
    </tr>

    <?php if (isset($students)): ?>

        <?php foreach ($students as $index => $student): ?>
            <tr>
                <td><?php echo $index ?></td>
                <td>
                    <a href="../group/list-student.php?group=<?php echo $student->getGroup() ?>"><?php echo $student->getGroup() ?></a>
                </td>
                <td><?php echo $student->getName() ?></td>
                <td><?php echo $student->getEmail() ?></td>
                <td><?php echo $student->getPhone() ?></td>
                <td><img src="<?php echo "../upload/" . $student->getImage() ?>"
                         alt="" width="100"></td>
                <td><a href="../view/edit.php?index=<?php echo $index ?>"
                       class="editBtt">Edit</a>
                    <a onclick="return confirm('Are You Sure?')"
                       href="../action/delete.php?index=<?php echo $index ?>&img=<?php echo $student->getImage() ?>"
                       class="delButton">Delete</a>
                </td>
            </tr>

        <?php endforeach; ?>

    <?php endif; ?>
</table>
</body>
</html>

