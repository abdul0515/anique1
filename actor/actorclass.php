<?php 
require_once 'conn.php';
	class actor
	{
		function addactor($actorsArr)
		{
			global $conn;
			$actor_id=$actorsArr['actor_id'];
			$name=$actorsArr['name'];
			$dob=$actorsArr['dob'];
			$movie=$actorsArr['movie'];			
			$sql = "INSERT INTO `actortb`(`name`, `dob`, `movie`) VALUES ('$name','$dob','$movie')";
			$result=mysqli_query($conn,$sql);
		}
		
		//display actors 
		function displayActor()
			{
				global $conn;
				$sql = "SELECT * FROM actortb";
				$result=mysqli_query($conn,$sql);
				$actorData = [];
					while($row = mysqli_fetch_assoc($result))
					{
							$actorData[] =$row;
					}
				return $actorData;
			}
	}
	
?>