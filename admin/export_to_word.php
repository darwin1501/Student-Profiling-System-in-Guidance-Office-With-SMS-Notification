<?php

include '../database/db.php';

session_start();
$student_id = $_SESSION['student_id'];

//find age
$student_info = mysqli_query($con, "SELECT * FROM std_prf WHERE student_id = '$student_id'");
$result = mysqli_fetch_array($student_info);
$result['dob'];
//calculate age
$dateOfBirth = $result['dob'];
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));


header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=student.doc");

echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";

echo "<table>";
	echo "<tr>";
		echo "<td><b >LRN: </b>".$result['lrn']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td><b>Fullname: </b>" .$result['full_name']."</td>";
		echo "<td style='padding-left:-200px;'><b>Age: </b>" .$result['age']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Gender: </b>" .$result['gen']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Date of Birth: </b>" .$result['dob']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Nationality: </b>" .$result['nat']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Religion: </b>" .$result['rel']."</td>";
	echo "</tr>";
	echo "</tr>";
		echo "<td style='margin:100, 0, 0, 0;'><b>Address: </b>" .$result['addr']."</td>";
	echo "</tr>";
	echo "</tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Cellphone #: </b>" .$result['tel']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Father: </b>" .$result['fathers_name']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Age: </b>" .$result['fathers_age']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Occupation: </b>" .$result['fathers_occu']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Mother: </b>" .$result['mothers_name']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Age: </b>" .$result['mothers_age']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Occupation: </b>" .$result['mothers_occu']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>No. of Child: </b>" .$result['no_of_child']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>No. of Boys: </b>" .$result['no_of_boys']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>No. of Girls: </b>" .$result['no_of_girls']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Siblings Position: </b>" .$result['sib_pos']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Living With Whom: </b>" .$result['lvg_whom']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Elementary School Graduated From: </b>" .$result['elem_school']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>School Year: </b>" .$result['elem_sy']."</td>";
	echo "</tr>";


	echo "<tr>";
	echo "<td> </td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><b><h3>Schools Attended</h3></b></td>";
	echo "<tr>";
	echo "</td></td>";
	echo "</tr>";
	echo "</tr>";
	$find_lrn = mysqli_query($con, "SELECT * FROM other_sch WHERE lrn = '".$result['lrn']."'");

	while ($row = mysqli_fetch_array($find_lrn)) { 
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>School Name:</b>" .$row['other_sch_name']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Section:</b>" .$row['other_sec']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Grade:</b>" .$row['other_grd']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>School Year:</b>" .$row['other_sy']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Adviser:</b>" .$row['other_cls_ad']."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "</td></td>";
	echo "</tr>";
		
	}

	echo "<tr>";
	echo "</td></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td><b><h3>Violations</h3></b></td>";
	echo "<tr>";
	echo "</td></td>";
	echo "</tr>";
	echo "</tr>";
	$find_lrn = mysqli_query($con, "SELECT * FROM std_violation WHERE lrn = '".$result['lrn']."'");

	while ($row = mysqli_fetch_array($find_lrn)) { 
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Violation:</b>" .$row['violation']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Violation Type:</b>" .$row['v_type']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Grade:</b>" .$row['v_grd']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Section:</b>" .$row['v_sec']."</td>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Date:</b>" .$row['v_date']."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td style='margin:0, 0, 0, 0;'><b>Reference Book:</b>" .$row['rfc_bk']."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "</td></td>";
	echo "</tr>";
		
	}
echo "</table>";
echo "</body>";
echo "</html>";

// header("location:student_profile.php");
?>
