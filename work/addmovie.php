<?php
// Include the database connection and Movie class
require_once 'conn.php';
require_once 'movieclass.php';

$error = ""; // Variable to store any error message

// Check if the form has been submitted
if (isset($_POST['add_movie']) && $_POST['add_movie'] == 'submit') {
    // Retrieve form data
    $name = $_POST['name'];
    $director = $_POST['director'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    // Check if any field is empty
    if (empty($name) || empty($director) || empty($year) || empty($description)) {
        $error = "All fields are required. Please fill out all fields.";
    } else {
		$movobj = new movie();
		$movobj->addmovie($_POST);
       echo "movie added succesfully;";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieRulez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
    <style>
       
    </style>
</head>
<?php include "headerfooter.php";?>
<body>
    <div class="container">
        <h1>Add a New Movie</h1>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Movie Title</label>
                <input type="text" class="form-control" id="title" name="name" required>
            </div>
            <div class="mb-3">
                <label for="director" class="form-label">Director</label>
                <input type="text" class="form-control" id="director" name="director" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div><div class="mb-3">
                <label for="description" class="form-label">poster</label>
                <textarea class="form-control" id="poster" name="poster" rows="3" required></textarea>
            </div>
            <button type="submit" name="add_movie" value="submit" class="btn btn-primary">Add Movie</button>
        </form>
    </div>
</body>
<?php include "footer.php";?>
</html>
