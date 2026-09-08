<?php

include "../Model/conection.php";

$db = new mydb();

$conn = $db->openConn();


if (isset($_GET["id"]) && isset($_GET["status"])) {

    $id = $_GET["id"];

    $status = $_GET["status"];


    $result = $db->updateStatus("content_requests",$id,$status,$conn);


    if ($result) {

        header("Location: ../View/requestview.php");
        exit();

    }
    else {

        echo "Status update failed";

    }

}


$conn->close();

?>