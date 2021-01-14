<?php
include_once 'dbconfig.php';

// delete condition
if(isset($_GET['delete_id']))
{
	$user_id = $_GET['delete_id'];
	$sql_query=mysqli_query($con,"DELETE FROM users WHERE user_id = '$user_id' ");

	header("Location: $_SERVER[PHP_SELF]");
}
// delete condition

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRUD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
function edt_id(id)
{
	if(confirm('Sure to edit ?'))
	{
		window.location.href='edit_data.php?edit_id='+id;
	}
}
function delete_id(id)
{
	if(confirm('Sure to Delete ?'))
	{
		window.location.href='index.php?delete_id='+id;
	}
}
</script>
</head>
<body>

<div class="container">

		<div class="well">
			<h3>CREATE READ UPDATE DELETE</h3>
		</div>


	<div class="jumbotron">

    <?php if (isset($_SESSION['message'])) {
    	# code...
    	echo $_SESSION['message'];
    	unset($_SESSION['message']);
    } ?>

        <table align="center" class="table table-condensed table-hover">
			    <tr>
			    <th colspan="4"><a href="add_data.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add data</a></th>
			    </tr>
			    <th>First Name</th>
			    <th>Last Name</th>
			    <th>City Name</th>
			    <th></th>
			    </tr>
			    <?php
				$result_set=mysqli_query($con,"SELECT * FROM users");
				if(mysqli_num_rows($result_set)>0)
				{
			        while($row=mysqli_fetch_row($result_set))
					{
					?>
			            <tr>
			            <td><?php echo $row[1]; ?></td>
			            <td><?php echo $row[2]; ?></td>
			            <td><?php echo $row[3]; ?></td>
			            <td><a class="btn btn-sm btn-warning" href="javascript:edt_id('<?php echo $row[0]; ?>')"><span class="glyphicon glyphicon-edit"></span> Update</a>
			            <a class="btn btn-sm btn-danger" href="javascript:delete_id('<?php echo $row[0]; ?>')"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
			            </tr>
			        <?php
					}
				}
				else
				{
					?>
			        <tr>
			        <td colspan="5">No Data Found !</td>
			        </tr>
			        <?php
				}
				?>
			    </table>
    </div>


    </div>

</body>
</html>