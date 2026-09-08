function deleteContent(id, button) {

    var confirmDelete = confirm("Are you sure you want to delete this content?");


    if (!confirmDelete) {

        return;

    }


    var xhttp = new XMLHttpRequest();


    xhttp.open( "GET","../Controller/delete.php?id=" + id,true);


    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);

            if (this.responseText == "success") 
            {

                let row = button.parentElement.parentElement;

                row.remove();

                document.getElementById("deleteMessage").innerHTML = "Content deleted successfully";

            }

            else
            {

                document.getElementById("deleteMessage").innerHTML = "Delete failed";

            }

        }

    };


    xhttp.send();

}