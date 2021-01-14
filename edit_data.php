<?php
include_once 'dbconfig.php';
if(isset($_GET['edit_id']))
{
	$edit_id = $_GET['edit_id'];
	$result_set=mysqli_query($con,"SELECT * FROM users WHERE user_id = '$edit_id'");
	$fetched_row=mysqli_fetch_array($result_set);
}
if(isset($_POST['btn-update']))
{
	// variables for input data
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$city_name = $_POST['city_name'];
	// variables for input data
	
	// sql query for update data into database
	$sql_query = mysqli_query($con,"UPDATE users SET first_name='$first_name',last_name='$last_name',user_city='$city_name' WHERE user_id='$edit_id'");
	// sql query for update data into database

	$_SESSION['message'] = '
		<div class="alert alert-info alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    <strong>Success!</strong> '.$first_name.' '.$last_name.' from <i>'.$city_name.'</i> updated to database!
		</div>
	';
	
	
	// sql query execution function
	if($sql_query)
	{
		?>
		<script type="text/javascript">
		alert('Data Are Updated Successfully');
		window.location.href='index.php';
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert('error occured while updating data');
		</script>
		<?php
	}
	// sql query execution function
}
if(isset($_POST['btn-cancel']))
{
	header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>CRUD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>


	<div class="container">
	<div class="well">
			<h3>CREATE READ UPDATE DELETE</h3>
	</div>
	<div class="jumbotron">
	    <form method="post">
		    <table class="table table-condensed table-hover">
			    <tr>
			    <td><input class="form-control" type="text" name="first_name" placeholder="First Name" value="<?php echo $fetched_row['first_name']; ?>" required /></td>
			    </tr>
			    <tr>
			    <td><input class="form-control" type="text" name="last_name" placeholder="Last Name" value="<?php echo $fetched_row['last_name']; ?>" required /></td>
			    </tr>
			    <tr>
			    <td><input class="form-control" type="text" name="city_name" placeholder="City" value="<?php echo $fetched_row['user_city']; ?>" required /></td>
			    </tr>
			    <tr>
			    <td>
			    <button type="submit" name="btn-update" class="btn btn-primary"><strong><span class="glyphicon glyphicon-check"></span> UPDATE</strong></button>
			    <button type="submit" name="btn-cancel" class="btn btn-warning"><strong><span class="glyphicon glyphicon-remove-sign"></span> CANCEL</strong></button>
			    </td>
			    </tr>
		    </table>
	    </form>
	    </div>
    </div>

</body>
</html>