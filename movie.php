
<?php	
	
class Movie {
    private $conn;

    // Constructor that accepts a database connection
    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    // Method to add a movie to the database
    public function addMovie($name, $director, $year, $description) {
        // Prepare the SQL statement
        $sql = "INSERT INTO `addmovie` (`name`, `director`, `year`, `description`) VALUES (?, ?, ?, ?)";
        
        // Prepare and execute the statement
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssis", $name, $director, $year, $description);

        // Execute and return the result
        return $stmt->execute();
    }
	public function displayMovie(){
		include 'movieconnect.php';
$sql = "SELECT * from addmovie";
	$result = mysqli_query($conn,$sql);
	$moviesArr = [];
	while($row = mysqli_fetch_assoc($result)) {
	$moviesArr[] = $row;
	}
		if (is_array($moviesArr) && count($moviesArr) > 0) { ?>
<div class="container mt-4">
    <div class="movie-table">
        <h2 class="text-center mt-3">Movie List</h2>
        <table class="table table-dark table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Year</th>
                    <th scope="col">Director</th>
                    <th scope="col">Description</th>
					<th scope="col">Action</th>
                </tr>
            </thead>
			<?php
	   foreach ($moviesArr as $movie) { ?> 
            <tbody>
                <tr>
                    <td><?php echo $movie['name'] ?> </td>
                    <td><?php echo $movie['year'] ?></td>
                    <td><?php echo $movie['director'] ?></td>
                    <td><?php echo $movie['description'] ?></td>
					<td>
						<a href>EDIT</a>
						<a href>EDIT</a>
						<a href>EDIT</a>
					</td>
                </tr>
				 <?php
	   }
	   ?>
            </tbody>
        </table>
		<?php
  }
?>
    </div>
</div><?php
	}
}
?>