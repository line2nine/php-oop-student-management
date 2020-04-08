<?php
include "../class_lib/Student.php";
include "../class_lib/StudentManager.php";
$index = $_REQUEST['index'];

$studentManager = new StudentManager("../data/data.json");
$student = $studentManager->getStudentByIndex($index);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Student</title>
</head>
<body>
<form action="../action/update.php?index=<?php echo $index ?>" method="post">
    <table class="TableList">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" class="TableList" value="<?php echo $student[0]->getName()?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" class="TableList" value="<?php echo $student[0]->getEmail() ?>"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone" class="TableList" value="<?php echo $student[0]->getPhone() ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td> <button type="submit" class="buttonAdd">Update</button></td>
        </tr>
    </table>
</form>
</table>
</body>
</html>
