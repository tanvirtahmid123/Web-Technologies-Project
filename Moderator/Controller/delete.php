<?php

include "../Model/conection.php";

$db = new mydb();

$conn = $db->openConn();


if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $sql = "DELETE FROM contents WHERE id = '$id'";

    $result = $conn->query($sql);


    if ($result) {

        echo "success";

    }

    else {

        echo "failed";

    }

}


$conn->close();

?>