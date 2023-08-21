<?php 
include ('connection.php');

if(isset($_POST['add'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $title = $_POST['title'];

    $query = "INSERT INTO details(firstname,lastname,address,title) VALUES('$fname','$lname','$address','$title')";
	$result=mysqli_query($con,$query);
    if($result){
        header("location: index.php?success=add");
    }else{
        echo "Connection Error: ".mysqli_connect_error();
    }
}

if(isset($_POST['update'])){

    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $title = $_POST['title'];

    $query = "UPDATE details SET firstname='$fname',lastname='$lname',address='$address',title='$title' WHERE id=$id";
	$result=mysqli_query($con,$query);
    if($result){
        header("location: index.php");
    }else{
       echo "Error updating data: "  .mysqli_connect_error();
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM details WHERE id=$id";
	$result=mysqli_query($con,$query);
    if ($result) {
        header("location: index.php");
    } else {
        echo "Error: " .mysqli_connect_error();
    }
}
?>