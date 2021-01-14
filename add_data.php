<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
	// variables for input data
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$city_name = $_POST['city_name'];
	// variables for input data
	
	// sql query for inserting data into database
	$sql_query = mysqli_query($con,"INSERT INTO users(first_name,last_name,user_city) VALUES('$first_name','$last_name','$city_name')");
	// sql query for inserting data into database
	$_SESSION['message'] = '
		<div class="alert alert-success alert-dismissible">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    <strong>Success!</strong> '.$first_name.' '.$last_name.' from <i>'.$city_name.'</i> added to database!
		</div>
	';
	
	// sql query execution function
	if($sql_query)
	{
		?>
		<script type="text/javascript">
		window.location.href='index.php';
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert('error occured while inserting your data');
		</script>
		<?php
	}
	// sql query execution function
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
</head>
<body>


	<div class="container">
			<div class="well">
			    <a href="index.php" class="btn btn-primary btn-link"><span class="glyphicon glyphicon-home"></span> HOME</a>
			</div>


		<div class="jumbotron">
	   <form method="post">
		    <table class="table table-condensed table-hover">
		    <tr>
		    	<td><h3>ADD DATA</h3></td>
		    </tr>
			    <tr>
			    <td><input type="text" class="form-control" name="first_name" placeholder="First Name" required /></td>
			    </tr>
			    <tr>
			    <td><input type="text" class="form-control" name="last_name" placeholder="Last Name" required /></td>
			    </tr>
			    <tr>
			    <td><input type="text" class="form-control" name="city_name" placeholder="City" required /></td>
			    </tr>
			    <tr>
			    <td><button type="submit" class="btn btn-primary form-control" name="btn-save"><strong><span class="glyphicon glyphicon-save"></span> SAVE</strong></button></td>
			    </tr>
		    </table>
	    </form>
	    </div>
    </div>

</body>
</html>