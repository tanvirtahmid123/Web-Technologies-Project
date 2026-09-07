<?php

include "../Model/conection.php";

$db = new mydb();

$conn = $db->openConn();

$result = $db->getData("content_requests", $conn);

?>