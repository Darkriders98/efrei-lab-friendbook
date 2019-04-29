<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>
        My friend's book
    </title>
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>

<header>
    Friend's book
</header>

<form action="MyDB.php" method="post">
    Name: <input type="text" name="name"> <br>
    Surname: <input type="text" name="surname"> <br>
    Email: <input type="text" name="email"> <br>
    <input type="submit" style="border-radius: 20%; background-color: darkgoldenrod" value="Filter friends">
</form>

<?php

class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('friends.db');
    }
}

$db = new MyDB();
if (!$db) {
    echo $db->lastErrorMsg();
    exit();
}

if(isset($_POST['name'])){
    $name = $_POST['name'];
}else $name = "";

if(isset($_POST['surname'])){
    $surname = $_POST['surname'];
}else $surname = "";

if(isset($_POST['email'])){
    $email = $_POST['email'];
}else $email = "";

echo "<h2>My friends</h2>";

$sql = "select * from friend";

$sql .= " WHERE name LIKE '%$name%' AND surname LIKE '%$surname%' AND email LIKE '%$email%'";

$ret = $db->query($sql);
while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
    echo $row['name'] . " " . $row['surname'] . " [" . $row['email'] . "]" . " <br>";
}

$db->close();
?>

</body>