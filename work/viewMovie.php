<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieRulez</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
	</head>
<?php include "headerfooter.php";
include 'conn.php';
require "movieclass.php";
				$id = $_GET['id'];

$viewmovie= new movie();
print_r($viewmovie->details($id));

