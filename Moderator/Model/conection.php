<?php

class mydb {

    function openConn()
    {
        return new mysqli("localhost","root", "","ftp_server");
    }


    function insertData(
        $table,
        $title,
        $description,
        $file_path,
        $category_id,
        $uploader_id,
        $conn
    ) {

        $sql = "INSERT INTO $table(title, description, file_path, category_id, uploader_id, download_count) VALUES ('$title', '$description', '$file_path', '$category_id', '$uploader_id', '0')";

        return $conn->query($sql);
    }


    function getData($table, $conn)
    {

        $sql = "SELECT * FROM $table";

        return $conn->query($sql);
    }

    function deleteData($table, $id, $conn)
{
    $sql = "DELETE FROM $table WHERE id='$id'";

    return $conn->query($sql);
}

   
function updateStatus($table, $id, $status, $conn)
{
    $sql = "UPDATE $table SET status='$status' WHERE id='$id'";

    return $conn->query($sql);
}


}

?>