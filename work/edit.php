<?php 
 $error='';
 include 'movieclass.php'; 
 $id = $_GET['id'];
 $moviesobj = new movie();
 $movies = $moviesobj->details($id);
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
        <h1>EDIT Movie Details</h1>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Movie Title</label>
                <input type="text" class="form-control" id="title" name="name" value = "<?php echo $movies['name'];?>">
            </div>
            <div class="mb-3">
                <label for="director" class="form-label">Director</label>
                <input type="text" class="form-control" id="director" name="director" value = "<?php echo $movies['director'];?>">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control" id="year" name="year" value = "<?php echo $movies['year'];?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?php echo $movies['description'];?></textarea>
            </div><div class="mb-3">
                <label for="description" class="form-label">poster</label>
                <textarea class="form-control" id="poster" name="poster" rows="3"><?php echo $movies['poster_link'];?></textarea>
            </div>
            <button type="submit" name="add_movie" value="submit" class="btn btn-primary">UPDATE</button>
        </form>
    </div>
</body>
<?php include "footer.php";?>
</html>
