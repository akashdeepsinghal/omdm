<?php
include 'session.php';
include 'connect.php';
$id = $_GET["id"];
echo($id);
$sql="DELETE FROM movies WHERE id=$id";
if (mysql_query($sql)) {
    echo "Movie deleted successfully";
} else {
    echo "Error: " . mysql_error($conn);
}
?>