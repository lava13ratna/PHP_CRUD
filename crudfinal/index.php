<html>
<head>
<title>CRUD Application</title>
</head>
<body>

    <?php 
		include("connection.php");
		$query = "SELECT * FROM details";
		$result = mysqli_query($con, $query);
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query1 = "SELECT * FROM details WHERE id = $id";
			$result1 = mysqli_query($con, $query1);
			$row1 = mysqli_fetch_assoc($result1);
		}
    ?>
	
<h1>Member Details</h1><br>
    <table border=2px>
        <thead>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Job Title</th>
            <th>Action</th>
        </thead>
        <tbody>
        <?php 
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
            
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td>
                    <a href="index.php?id=<?php echo $id ?>">Edit</a>
					<a href="memberaction.php?id=<?php echo $id; ?>&action=delete">Remove</a>
                </td>
          
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>

    <br><br>
        <h1><?php if(isset($_GET['id'])){ echo "update members"; }else{ echo "Add members";} ?></h1><br>
        <form action="memberaction.php" method="POST">
            <input type="hidden" name="id" value='<?php if(isset($_GET['id'])){ echo $row1['id']; } ?>'>
            <label for="fname">First Name: </label>
            <input type="text" name="fname" value='<?php if(isset($_GET['id'])){ echo $row1['firstname']; } ?>'>
            <br><br>
            <label for="lname">Last Name: </label>
            <input type="text" name="lname" value='<?php if(isset($_GET['id'])){ echo $row1['lastname']; } ?>'>
            <br><br>
            <label for="address">Address: </label>
            <input type="text" name="address" value='<?php if(isset($_GET['id'])){ echo $row1['address']; } ?>'>
            <br><br>
            <label for="title">Job Title: </label>
            <input type="text" name="title" value='<?php if(isset($_GET['id'])){ echo $row1['title']; } ?>'>
            <br><br>

            <input type="submit" name="<?php if(isset($_GET['id'])){ echo "update"; }else{ echo "add";} ?>" value="<?php if(isset($_GET['id'])){ echo "Update"; }else{ echo "Add";} ?>">

        </form>
	<?php
	if(isset($_GET['success'])){
		$success=$_GET['success'];
		if($success='add'){
			echo "<p>added</p>";
		}	
	}
	?>
</body>
</html>