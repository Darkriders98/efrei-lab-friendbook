<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>
        My friend's book
    </title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

<header>
    Friend's book
</header>

<ul id="navbar">
    <li><a href="https://darkriders98.github.io/index.html">Home</a></li>
    <li><a href="https://darkriders98.github.io/tasks.html">Tasks</a></li>
    <li><a href="https://darkriders98.github.io/shopping.html">Shopping</a></li>
    <li><a href="index.php">Friend's book</a></li>
    <li><a href="https://www.blizzard.com/en-us/">Blizzard website</a></li>
</ul>

<form action="index.php" method="post">
    Name: <input type="text" name="name">
    <input type="submit" style="border-radius: 20%; background-color: darkgoldenrod" value="Add a friend">
</form>

<?php
$filename = 'friends.txt';
$file = fopen($filename, "a");

if (isset($_POST['name'])) {
    if ($_POST['name'] != "") {
        fwrite($file, $_POST['name'] . "\n");
    }
}

fclose($file);
?>

<h1>
    My best friends :
</h1>

<?php
$filename = 'friends.txt';
$file = fopen($filename, "r");

$nameFilter = "";
$startingWith = FALSE;

if (isset($_POST['nameFilter'])) {
    $nameFilter = $_POST['nameFilter'];
}

if (isset($_POST['startingWith'])){
    $startingWith = $_POST['startingWith'];
}


echo "<ul>";
while (!feof($file)) {
    $names = fgets($file);
    if ($names != "") {
        if ($nameFilter == "") {
            echo "<li>$names</li>";
        } else {
            $result = strstr($names, $nameFilter);
            if (!$startingWith) {
                if ($result != "") {
                    echo "<li>$names</li>";
                }
            } else {
                if ($result == $names){
                    echo "<li>$names</li>";
                }
            }
        }
    }
}
echo "</ul>";

fclose($file);
?>

<form action="index.php" method="post">
    <input type="text" name="nameFilter" value="<?= $nameFilter ?>" placeholder="Name filter">
    <input type="checkbox" name="startingWith" value="TRUE">Only names started with</input>
    <input type="submit" style="border-radius: 20%; background-color: darkgoldenrod" value="Filter list">
</form>


</body>
</html>
