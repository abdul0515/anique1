<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieRulez</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Header Section -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
     <?php include "headerfooter.php";?>
        <form class="d-flex mx-auto" role="search">
            <input class="form-control me-2" type="search" placeholder="Search for a movie..." aria-label="Search">
            <button class="btn btn-outline-warning" type="submit">Search</button>
        </form>
        <button class="btn btn-warning ms-auto" type="button"><a href = "addmovie.php">Add Movie</a></button>
    </div>
</nav>


<!-- Main Content Section -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">movie ID</th>
	  <th scope="col">poster</th>
      <th scope="col">title</th>
      <th scope="col">year</th>
      <th scope="col">director</th>
	  <th scope="col">Actions</th>
	   
    </tr>
  </thead>
  <tbody>
    
<?php 
include 'movieclass.php'; 
 $moviesobj = new movie;
 $moviesData = $moviesobj->display();

foreach ($moviesData as $movies) {?> 
		
    <tr>
		<td><?php echo $movies['movie_id'];?></td>
		<td><img src= "<?php echo $movies['poster_link'];?>" alt="poster" width="150" height="200"></td>
		<td><?php echo $movies['name'];?></td>
		<td><?php echo $movies['year'];?></td>
		<td><?php echo $movies['director'];?></td>
		<td><a href ="edit.php?id=<?php echo $movies['movie_id']?>">Edit</a> <a href ="viewMovie.php?id=<?php echo $movies['movie_id'];?>">View</a><a href ="#">Delete</a></td>
	</tr> 
<?php }?>

  </tbody>
</table>
<?php include "footer.php";?>

<!-- Bootstrap JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
