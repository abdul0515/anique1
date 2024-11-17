<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINECIRCLE</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
	</head>
	<?php include_once "header.php" ?>
	<body>
	<div class="opacity-75">
	<table class="table caption-top">
		<caption style="colour:green;"><h3>List of users</h3></caption>
		<thead>
			<tr>
				<th scope="col">Photo</th>
				<th scope="col">name</th>
				<th scope="col">dob</th>
				<th scope="col">movies</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
			<tbody>
			<?php 
			include 'actorclass.php';
			$actorObj = new actor;
			$actorData = $actorObj->displayActor();
			
			foreach ($actorData as $actors) {?> 
		
    <tr>
		<td><img src= "<?php echo $actors['actor_link'];?>" alt="poster" width="150" height="200"></td>
		<td><?php echo $actors['name'];?></td>
		<td><?php echo $actors['dob'];?></td>
		<td><?php echo $actors['movie'];?></td>
		<td><a href ="edit.php?id=<?php echo $actors['actor_id']?>">Edit</a> <a href ="viewactor.php?id=<?php echo $actors['actor_id'];?>">View</a><a href ="#">Delete</a></td>
	</tr> 
<?php }?>
			</tbody>
</table>
	
	</div>
</body>
	</html>