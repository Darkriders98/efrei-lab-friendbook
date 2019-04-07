<!DOCTYPE html>
<html lang="en">
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
<!--    <li><a href="html/index.html">Home</a></li>-->
<!--    <li><a href="html/tasks.html">Tasks</a></li>-->
<!--    <li><a href="html/shopping.html">Shopping</a></li>-->
    <li><a href="index.php">Friend's book</a></li>
    <li><a href="https://www.blizzard.com/en-us/">Blizzard website</a></li>
</ul>

<form action="index.php" method="post">
    Name: <input type="text" name="name">
    <input type="submit" style="border-radius: 20%; background-color: darkgoldenrod">
</form>

<?php
$filename = 'friends.txt';
$file = fopen($filename, "a");

if (array_key_exists('name', $_POST)) {
    fwrite($file, $_POST['name'] . "\n");
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

if (array_key_exists('nameFilter', $_POST)){
    $nameFilter = $_POST['nameFilter'];
}

echo "<ul>";
while (!feof($file)) {
    $names = fgets($file);
    if ($nameFilter == "") {
        if ($names != "") {
            echo "<li>$names</li><br>";
        }
    }
    else{
        if ($names == $nameFilter){
            echo "<li>$names</li><br>";
        }
    }
}
echo "</ul>";
fclose($file);
?>

<form action="index.php" method="post">
    <input type="text" name="nameFilter" value="<?=$nameFilter?>" placeholder="Name filter">
    <input type="submit" style="border-radius: 20%; background-color: darkgoldenrod">
</form>


</body>
</html>
