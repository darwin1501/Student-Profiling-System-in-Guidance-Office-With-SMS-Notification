<?php 

ob_start();
session_start();

include '../../../../database/db.php'; ?>

<?php

// if the button grd7 was click
if (isset($_GET['grd7'])) {
	$grade = 7;
	$_SESSION['grd'] = $grade;
	$section = $_GET["section"];
	$_SESSION['sec'] = $section; 

}
// if the button grd8 was click
if (isset($_GET['grd8'])) {
	$grade = 8;
	$_SESSION['grd'] = $grade;
	$section = $_GET["section"];
	$_SESSION['sec'] = $section; 
}
// if the button grd9 was click
if (isset($_GET['grd9'])) {
	$grade = 9;
	$_SESSION['grd'] = $grade;
	$section = $_GET["section"];
	$_SESSION['sec'] = $section; 
}
// if the button grd10 was click
if (isset($_GET['grd10'])) {
	$grade = 10;
	$_SESSION['grd'] = $grade;
	$section = $_GET["section"];
	$_SESSION['sec'] = $section; 
}

// $section = $_SESSION['sec'];
// $grade = $_SESSION['grd'];

$result_date_from = $_SESSION['date_from'];
$result_date_to = $_SESSION['date_to'];


$section_query = mysqli_query($con, "SELECT * FROM std_violation INNER JOIN std_prf ON std_violation.lrn = std_prf.lrn WHERE  v_sec = '$section' AND v_grd = '$grade' AND v_date BETWEEN '$result_date_from' AND '$result_date_to' ");
?>

<html class="light-blue">
<head>
	<title><?php echo $section;?></title>
<script defer src="../../../../assets/font_awesome/fontawesome-all.js"></script>
<link type="text/css" rel="stylesheet" href="../../../../assets/css/materialize.min.css"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="../../../../assets/css/custom.css"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="../../../../assets/css/custom2.css"  media="screen,projection"/>
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<script type="text/javascript" src="../../../../assets/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../../../assets/js/jquery.table2excel.js"></script>
</head>
<body>
	<div class="card-panel" style="width:80%; margin-top:5%; margin-left:10%">
		<div class="row">
			<h4 class="push-s4 col s4"><?php echo $section;?></h4>
			<div class="push-s4 col s2">
				<button class="btn_export tooltipped" type="button" data-position="right" data-delay="50" data-tooltip="Export to Excel"><i class="fa fa-file-alt fa-2x icon-pad-5" style="color:#4caf50"></i></button>
			</div>
		</div>
						 	<table class="table2excel striped">
						 		<thead>
						 			<tr><th>Grade Level</th>
						 				<th>Name</th>
						 				<th>Gender</th>
						 				<th>Case</th>
						 				<th>Violation Type</th>
						 				<th>Date</th>
						 			</tr>
						 		</thead>
						 		<tbody>

							<?php 
								if(mysqli_num_rows($section_query) > 0){
						 		while($row = mysqli_fetch_array($section_query)) {
						 	 ?>
						 			<tr><td><?php echo $row['v_grd'];?></td>
						 				<td><?php echo $row['full_name'];?></td>
						 				<td><?php echo $row['gen'];?></td>
						 				<td><?php echo $row['violation'];?></td>
						 				<td><?php echo $row['v_type'];?></td>
						 				<td><?php echo $row['v_date'];?></td>
						 			</tr>
								<?php	
									} 
								} 
								?>
						 			
						 		</tbody>
						 	</table>
	</div>
</body>
</html>
<script type="text/javascript" src="../../../../assets/js/materialize.min.js"></script>

<script>
	$(".btn_export").click(function() {
		var section = '<?php echo $section;?>'
				$(".table2excel").table2excel({
					exclude: ".noExl",
					name: "Excel Document Name",
					filename: section+".xls",
					fileext: ".xls",
					exclude_img: true,
					exclude_links: true,
					exclude_inputs: true
				});
			});				
</script>
											

										

								

	

