<?php
	$conn  = mysqli_connect('localhost','root','','pdf');
	ini_set('max_execution_time', 600);
	// include autoloader
	require_once 'dompdf/autoload.inc.php';

	// reference the Dompdf namespace
	//use Dompdf\Dompdf;

	// instantiate and use the dompdf class
	//$dompdf = new Dompdf();
	
	
	$dompdf = new Dompdf\Dompdf();



	
	$sd = "SELECT * FROM `basicdetails` order by `id` desc";
	$rsd = mysqli_query($conn,$sd);
	$t = mysqli_fetch_array($rsd);
	
	
$html =
'
	<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Custom PDF</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
		<style>
			.iconbig{
				border:0px solid;
				background:;
			}
			.imgClass{
				width:50px;
				margin-left:92%;
			}
	
			.invoice-box{
				border:1px solid #eee;
				color:#555;
				line-height:24px;
				padding:5px;
				font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
			}
			
			.curDate{
				text-align:right;
				background:;
				margin-top:-5%;	
				margin-right:2px;			
			}
		
			.cusTable{
				width:100%;
				border-collapse:collapse;
			}
			

			table th , table td {
				border:1px solid #555;
				padding-left:5px;
			}
		</style>
		</head>		
		<body onload="window.print();">
			<div class="invoice-box">
			   <div class="col-md-12">
					<div class="iconbig">
						<img src="img/logo.png" class="imgClass">
					</div>';   
					$html = $html.
						'</table>
						<div class="col-md-12" style="height:26px;background:#D6D4D4;margin-top:10px;margin-bottom:10px;">
							<div class="col-md-12" style="text-align:center;">USER DETAILS</div>							
						</div>
						<div class="curDate">
							Date: '.date('d-m-Y').'
						</div>					   
                        <table class="table table-bordered cusTable">
                        <tr>
                           	<th>Sl.No.</th>
						   	<th>First Name</th>
						   	<th>Last Name</th>
						   	<th>Email</th>
						   	<th>D.O.B</th>
						   	<th>Gender</th>
                        </tr>';
						
							$i = 1;
						   foreach($rsd as $tt)
							{ 
								$html = $html.
								'<tr>
								  <td>'.$i.'</td>
								  <td>'.$tt['fname'].'</td>
								  <td>'.$tt['lname'].'</td>
								  <td>'.$tt['email'].'</td>
								  <td>'.$tt['dob'].'</td>
								  <td>'.$tt['gender'].'</td>
								</tr>';
								$i++;
							}
							$html = $html.	
							'</table>';						
					    
				   
				 $html = $html. 
				 '
				 </div>
			</div>
		</body>
	</html>
';


$dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
//$dompdf->setPaper('A5', 'landscape');

$dompdf->set_paper(array(0, 0, 595, 841), 'portrait');
//$dompdf->setPaper('A4', 'portland');
// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF (1 = download and 0 = preview)
$dompdf->stream("Custom-PDF",array("Attachment"=>0));
?>