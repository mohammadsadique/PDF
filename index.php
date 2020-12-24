<?php

$conn  = mysqli_connect('localhost','root','','pdf');

if(isset($_POST['sub'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	
	$sql = "INSERT INTO `basicdetails`( `fname`, `lname`, `email`, `dob`, `gender`) VALUES ('$fname','$lname','$email','$dob','$gender')";
	mysqli_query($conn,$sql);
	
	echo "<script>alert('Basic details successfully inserted.');</script>";
	echo "<script>window.location.href='index.php';</script>";
}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Basic Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
</head>
<body>

<div class="container">
  <h2>Basic Details form</h2>
  <form method="post">
    <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
    </div>
	<div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
	<div class="form-group">
      <label for="dob">Date Of Birth:</label>
      <input type="date" class="form-control" id="dob" placeholder="Date Of Birth" name="dob">
    </div>
    <div class="form-group">
      <label for="gender">Gender:</label>
		<select name="gender" id="gender" class="form-control">
		  <option value="Male">Male</option>
		  <option value="Female">Female</option>
		</select>
    </div>
    <button type="submit" name="sub" class="btn btn-primary">Submit</button>
  </form>
</div>

<hr>



<div class="container">
  <h2>View Details Table</h2>    
  <button type="submit" id="pdf" class="btn btn-primary" style="margin-bottom:19px">PDF Print</button> 
  <table class="table table-bordered" id="example">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Date Of Birth</th>
        <th>Gender</th>
      </tr>
    </thead>
    <tbody>
	<?php
	$a = "SELECT * FROM `basicdetails` order BY `id` DESC";
	$t = mysqli_query($conn,$a);
	$i = 1;
	while($dt = mysqli_fetch_array($t)){
	?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $dt['fname'] ?></td>
        <td><?php echo $dt['lname'] ?></td>
        <td><?php echo $dt['email'] ?></td>
        <td><?php echo $dt['dob'] ?></td>
        <td><?php echo $dt['gender'] ?></td>
      </tr>
	  <?php
	  $i++;
	}
	  ?>
    </tbody>
  </table>
</div>
</body>


<script src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
	
	$(document).on('click','#pdf',function(e){
		
		window.open('pdf.php', '_blank');
		
	});
	
	
} );
</script>
</html>
