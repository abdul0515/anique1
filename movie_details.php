<?php

require_once "movieconnect.php";
$id = $_GET['id'];
$query = "SELECT * FROM addmovie WHERE movie_id = $id";
$result = mysqli_query($conn,$query);
$movie_data = mysqli_fetch_assoc($result);
print_r ($movie_data);
?>