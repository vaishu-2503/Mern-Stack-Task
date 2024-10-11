<?php 
include "connection.php";
$id = $_GET['id'];
$sql = "SELECT * FROM transactions where (sender_id = '$id') or (receiver_id = '$id')";
$result = mysqli_query($con, $sql);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Transaction History</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
	<style>
	
		.button-create{
			border:20px solid #4394ba;
			border-radius:8px;
			width: 140px;
			height: 30px;
			background-color: #4394ba;
			color: #fff;
		}
		.button-create:hover{
			text-decoration: none;
			background-color: #db2c58;
			border:20px solid #db2c58;
			color: #fff;
		}
		.link-right{
			position: absolute;
			top:50px;
			left:200px;
		}
		.btn{
			width: 80px;
		}
		.display-4{
			margin-top: 80px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="box">
			<h4 class="display-4 text-center">Transactions</h4><br>
			<?php if (isset($_GET['success'])) { ?>
		    <div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		    <?php } ?>
		
		
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-striped" style="border: 2px solid rgb(9,169,233)">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Id</th>
			      <th scope="col">Sender_ID</th>
			      <th scope="col">Sender_Name</th>
                  <th scope="col">Receiver_ID</th>
				  <th scope="col">Receiver_Name</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Date And Time </th>

			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	   $i = 0;
			  	   while($rows = mysqli_fetch_assoc($result)){
			  	   $i++;
			  	 ?>
			    <tr>
			        <th scope="row"><?=$i?></th>
                    <td><?=$rows['transaction_id']?></td>
			        <td><?=$rows['sender_id']?></td>
			        <td><?=$rows['sender_name']; ?></td>
                    <td><?=$rows['receiver_id']?></td>
                    <td><?=$rows['receiver_name']?></td>
                    <td><?=$rows['amount']?></td>
                    <td><?=$rows['date']?></td>
				
			      </td> 
			    </tr>
			    <?php } ?>
			  </tbody>
			</table>
			<?php } ?>
		
		</div>
	</div>
    
    
</body>
</html>
<?php
include "navBar.php";
?>