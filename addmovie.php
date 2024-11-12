<?php
// Include the database connection and Movie class
require_once 'movieconnect.php';
require_once 'Movie.php';

$error = ""; // Variable to store any error message

// Check if the form has been submitted
if (isset($_POST['add_movie']) && $_POST['add_movie'] == 'submit') {
    // Retrieve form data
    $name = $_POST['title'];
    $director = $_POST['director'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    // Check if any field is empty
    if (empty($name) || empty($director) || empty($year) || empty($description)) {
        $error = "All fields are required. Please fill out all fields.";
    } else {
        // Instantiate the Movie class
        $movie = new Movie($conn);

        // Add the movie to the database
        $result = $movie->addMovie($name, $director, $year, $description);

        // Provide feedback based on the result
        if ($result) {
            echo "<p>Movie added successfully!</p>";
        } else {
            $error = "Failed to add movie.";
        }
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
    <style>
        body {
            background-color: #121212;
            color: #fff;
            font-family: 'Roboto', sans-serif;
        }
        .navbar {
			display: flex;
			justify-content: center;
            background-color: #2b2b2b;
        }
		.navbar-brand img {
			margin: 0;
            height: 100px; /* Adjust logo size */
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img class="d-flex mx-auto" role="search" src="logo.png" alt="MovieRulez Logo"> <!-- Replace with the path to your logo -->    
        </a>
	</div>
</nav>
<body>
    <div class="container">
        <h1>Add a New Movie</h1>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Movie Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
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
            </div>
            <button type="submit" name="add_movie" value="submit" class="btn btn-primary">Add Movie</button>
        </form>
    </div>
</body>
</html>
