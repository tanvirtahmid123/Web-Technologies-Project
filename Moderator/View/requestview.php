<?php

include "../Controller/requestList.php";

?>

<a href="index.php">
    <button type="button">Back to Moderator Page</button>
</a>

<!DOCTYPE html>

<html>

<head>

    <title>Content Requests</title>
    <link rel="stylesheet" href="../CSS/request.css">

</head>

<body>

<h1>Content Requests</h1>

<table border="1">

    <tr>

        <th>ID</th>
        <th>Requester IP</th>
        <th>Content Title</th>
        <th>Category</th>
        <th>Message</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Action</th>

    </tr>

<?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        echo "<tr>";

        echo "<td>" . $row["id"] . "</td>";

        echo "<td>" . $row["requester_ip"] . "</td>";

        echo "<td>" . $row["content_title"] . "</td>";

        echo "<td>" . $row["category_requested"] . "</td>";

        echo "<td>" . $row["message"] . "</td>";

        echo "<td>" . $row["status"] . "</td>";

        echo "<td>" . $row["created_at"] . "</td>";


        echo "<td>";

        echo "<a href='../Controller/updateStatus.php?id=" . $row["id"] . "&status=fulfilled'> Fulfilled </a>";

        echo "<br><br>";

        echo "<a href='../Controller/updateStatus.php?id=" . $row["id"] . "&status=rejected'> Rejected </a>";

        echo "</td>";


        echo "</tr>";

    }

}
else 
{

    echo "<tr>";

    echo "<td>No content requests found</td>";

    echo "</tr>";

}

?>

</table>

</body>

</html>