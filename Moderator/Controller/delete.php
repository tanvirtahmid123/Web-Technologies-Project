<?php

include "../Model/conection.php";

$db = new mydb();

$conn = $db->openConn();

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $result = $db->deleteData("contents", $id, $conn);

    if ($result) {
        echo "success";
    }
    else {
        echo "failed";
    }
}

$conn->close();

?>