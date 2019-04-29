<?php

class MyDB extends SQLite3 {
    function __construct() {
        $this->open('friends.db');
    }
}

$db = new MyDB();
if(!$db) {
    echo $db->lastErrorMsg();
    exit();
}

echo "<h2>My friends</h2>";
$sql = "select * from friend";
$ret = $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
    echo $row['name'] . " <br>";
}

$db->close();