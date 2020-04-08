<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Add Student</title>
</head>
<body>
<form action="../action/create.php" method="post">
    <table class="TableList">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" class="TableList"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" class="TableList"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone" class="TableList"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" class="buttonAdd">Create</button></td>
        </tr>
    </table>
</form>

</body>
</html>
