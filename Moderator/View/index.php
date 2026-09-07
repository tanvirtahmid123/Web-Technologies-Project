<?php

include "../Controller/validation.php";

?>

<!DOCTYPE html>

<html>

<head>

    <title>FTP Server - Moderator</title>

    <link rel="stylesheet" href="../CSS/style.css">

</head>

<body>


<div id="main-container">


    

    <div id="form-container">

        <h1>Content Submission</h1>

       

        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">


            <label>Title</label>

            <input type="text" id="title" name="title">

            <p id="titleerr" class="error"></p>

            <?php echo $titleErr; ?>


            <label>Description</label>

            <textarea id="description"
                      name="description"
                      rows="6"></textarea>

            <p id="descriptionerr" class="error"></p>

            <?php echo $descriptionErr; ?>


            <label>Category</label>

            <select id="category" name="category">

                <option value="">Select Category</option>

                <option value="1">Movies</option>
                <option value="2">Music</option>
                <option value="3">Videos</option>
                <option value="4">Images</option>
                <option value="5">Documents</option>
                <option value="6">E-Books</option>

            </select>

            <p id="categoryerr" class="error"></p>

            <?php echo $categoryErr; ?>


            <label>Upload Content File</label>

            <input type="file" id="cfile" name="file">

            <p id="fileerr" class="error"></p>

            <?php echo $fileErr; ?>


            <div class="buttons">

                <input type="submit" name="mysubmit" value="Submit" class="submit-btn">

                <input type="reset" value="Clear" class="clear-btn">

            </div>

            <p id="successMessage"></p>
            <?php echo $successMsg; ?>


        </form>

    </div>



  

    <div id="content-list">

        <h1>Available Contents</h1>
       <p id="deleteMessage"></p>


        <table border="1">

            <tr>

                <th>ID</th>

                <th>Title</th>

                <th>Description</th>

                <th>File</th>

                <th>Category</th>

                <th>Uploader</th>

                <th>Action</th>

            </tr>


            <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    echo "<tr>";

                    echo "<td>" . $row["id"] . "</td>";

                    echo "<td>" . $row["title"] . "</td>";

                    echo "<td>" . $row["description"] . "</td>";

                    echo "<td>" . $row["file_path"] . "</td>";

                    echo "<td>" . $row["category_id"] . "</td>";

                    echo "<td>" . $row["uploader_id"] . "</td>";

                    echo "<td>";

                    echo "<button onclick='deleteContent(" . $row["id"] .  ", this)'>Delete</button>";

                    echo "</td>";

                    echo "</tr>";

                }

            }

            else {

                echo "<tr>";

                echo "<td>No content found</td>";

                echo "</tr>";

            }

            ?>

        </table>

    </div>


</div>


<script src="../JS/validation.js"></script>

<script src="../JS/ajax.js"></script>


</body>

</html>