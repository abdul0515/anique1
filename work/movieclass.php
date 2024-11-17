<?php
require_once 'conn.php';
	class movie 
{ 			//addmovie function
			function addmovie($moviesArr)
			{
				global $conn;
				$poster=$moviesArr['poster'];
				$name=$moviesArr['name'];
				$director=$moviesArr['director'];
				$year=$moviesArr['year'];
				$description=$moviesArr['description'];
	$sql= "INSERT INTO `addmovie`( `poster_link`, `name`, `director`, `year`, `description`) VALUES ('$poster','$name','$director','$year','$description')";
	$result = mysqli_query($conn,$sql);
			}
			//display function
			function display()
			{
				global $conn;
				$sql = "SELECT * FROM addmovie";
				$result=mysqli_query($conn,$sql);
				$movieData = [];
					while($row = mysqli_fetch_assoc($result))
					{
							$movieData[] =$row;
					}
				return $movieData;
			}
			
			//view function
			function details($id)
			{
				global $conn;
				$sql= "SELECT * FROM addmovie WHERE movie_id = $id";
				$result= mysqli_query($conn,$sql);
				$movieDetails = mysqli_fetch_assoc($result);
				return $movieDetails;
			}
			//edit movie 
			function editMovie($id)
			{	
			global $conn;
				$sql= "UPDATE `addmovie` SET `movie_id`=$id,`poster_link`='',`name`='',``='',`year`='',`description`='' ";
				$result= mysqli_query($conn,$sql);
				$movieDetails = mysqli_fetch_assoc($result);
				return $movieDetails;
				
			}

}
	

