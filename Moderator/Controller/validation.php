<?php

$titleErr = "";
$descriptionErr = "";
$categoryErr = "";
$fileErr = "";
$successMsg = "";

$title = "";
$description = "";
$category = "";
$fileName = "";


include "../Model/conection.php";

$db = new mydb();

$conn = $db->openConn();


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["title"])) {

        $titleErr = "Title is required";

    }
    elseif (!preg_match("/^[a-zA-Z0-9 ]*$/", $_POST["title"])) {

        $titleErr = "Only letters, numbers and white space allowed";

    }
    else {

        $title = test_input($_POST["title"]);

    }


    if (empty($_POST["description"])) {

        $descriptionErr = "Description is required";

    }
    elseif (strlen($_POST["description"]) < 10) {

        $descriptionErr = "Description must be at least 10 characters";

    }
    else {

        $description = test_input($_POST["description"]);

    }


    if (empty($_POST["category"])) {

        $categoryErr = "Category is required";

    }
    else {

        $category = test_input($_POST["category"]);

    }


    if (empty($_FILES["file"]["name"])) {

        $fileErr = "File is required";

    }
    else {

        $fileName = $_FILES["file"]["name"];

    }


    if ($titleErr == "" && $descriptionErr == "" && $categoryErr == "" && $fileErr == "")
    {

        $result = $db->insertData( "contents",$title,$description,$fileName,$category,1,$conn);


        if ($result) {

            $successMsg = "Content submitted successfully";

        }
        else {

            $successMsg = "Database insert failed";

        }

    }

}



$result = $db->getData("contents", $conn);


function test_input($data) {

    $data = trim($data);

    $data = stripslashes($data);

    return $data;

}

?>