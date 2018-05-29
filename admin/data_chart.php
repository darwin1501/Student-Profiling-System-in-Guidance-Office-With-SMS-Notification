<?php 
// $currentDateTime = date('Y-m-d H:i:s');
//     echo $currentDateTime;
// Chart js data
// get the current year
$year = date('Y');
//Example:
//insert year
// $date_from = date_create(''.$year.'-01-01');
// $date_to = date_create(''.$year.'-12-31');
// //create date format
// $result_date_from = date_format($date_from, 'Y-m-d ');
// $result_date_to = date_format($date_to, 'Y-m-d ');


//########################  JANUARY #############################
//concatenate the year.
$january_date_from = date_create(''.$year.'-01-01');
$january_date_to = date_create(''.$year.'-01-31');
$january_result_date_from = date_format($january_date_from, 'Y-m-d ');
$january_result_date_to = date_format($january_date_to, 'Y-m-d ');
//Select all matching records from the given date
$january_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$january_result_date_from'  AND '$january_result_date_to' ");
//count result
$count_january = mysqli_num_rows($january_total_violation);

//########################  FEBRUARY #############################
//concatenate the year.
$february_date_from = date_create(''.$year.'-02-01');
$february_date_to = date_create(''.$year.'-02-29');
$february_result_date_from = date_format($february_date_from, 'Y-m-d ');
$february_result_date_to = date_format($february_date_to, 'Y-m-d ');
//Select all matching records from the given date
$february_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$february_result_date_from'  AND '$february_result_date_to' ");
//count result
$count_february = mysqli_num_rows($february_total_violation);

//########################  FEBRUARY #############################
//concatenate the year.
$february_date_from = date_create(''.$year.'-02-01');
$february_date_to = date_create(''.$year.'-02-29');
$february_result_date_from = date_format($february_date_from, 'Y-m-d ');
$february_result_date_to = date_format($february_date_to, 'Y-m-d ');
//Select all matching records from the given date
$february_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$february_result_date_from'  AND '$february_result_date_to' ");
//count result
$count_february = mysqli_num_rows($february_total_violation);

//########################  MARCH #############################
//concatenate the year.
$march_date_from = date_create(''.$year.'-03-01');
$march_date_to = date_create(''.$year.'-03-31');
$march_result_date_from = date_format($march_date_from, 'Y-m-d ');
$march_result_date_to = date_format($march_date_to, 'Y-m-d ');
//Select all matching records from the given date
$march_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$march_result_date_from'  AND '$march_result_date_to' ");
//count result
$count_march = mysqli_num_rows($march_total_violation);

//########################  APRIL #############################
//concatenate the year.
$april_date_from = date_create(''.$year.'-04-01');
$april_date_to = date_create(''.$year.'-04-30');
$april_result_date_from = date_format($april_date_from, 'Y-m-d ');
$april_result_date_to = date_format($april_date_to, 'Y-m-d ');
//Select all matching records from the given date
$april_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$april_result_date_from'  AND '$april_result_date_to' ");
//count result
$count_april = mysqli_num_rows($april_total_violation);

//########################  MAY #############################
//concatenate the year.
$may_date_from = date_create(''.$year.'-05-01');
$may_date_to = date_create(''.$year.'-05-31');
$may_result_date_from = date_format($may_date_from, 'Y-m-d ');
$may_result_date_to = date_format($may_date_to, 'Y-m-d ');
//Select all matching records from the given date
$may_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$may_result_date_from'  AND '$may_result_date_to' ");
//count result
$count_may = mysqli_num_rows($may_total_violation);

//########################  JUNE #############################
//concatenate the year.
$june_date_from = date_create(''.$year.'-06-01');
$june_date_to = date_create(''.$year.'-06-30');
$june_result_date_from = date_format($june_date_from, 'Y-m-d ');
$june_result_date_to = date_format($june_date_to, 'Y-m-d ');
//Select all matching records from the given date
$june_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$june_result_date_from'  AND '$june_result_date_to' ");
//count result
$count_june = mysqli_num_rows($june_total_violation);

//########################  JULY #############################
//concatenate the year.
$july_date_from = date_create(''.$year.'-07-01');
$july_date_to = date_create(''.$year.'-07-31');
$july_result_date_from = date_format($july_date_from, 'Y-m-d ');
$july_result_date_to = date_format($july_date_to, 'Y-m-d ');
//Select all matching records from the given date
$july_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$july_result_date_from'  AND '$july_result_date_to' ");
//count result
$count_july = mysqli_num_rows($july_total_violation);

//########################  AUGUST #############################
//concatenate the year.
$august_date_from = date_create(''.$year.'-08-01');
$august_date_to = date_create(''.$year.'-08-31');
$august_result_date_from = date_format($august_date_from, 'Y-m-d ');
$august_result_date_to = date_format($august_date_to, 'Y-m-d ');
//Select all matching records from the given date
$august_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$august_result_date_from'  AND '$august_result_date_to' ");
//count result
$count_august = mysqli_num_rows($august_total_violation);

//########################  SEPTEMBER #############################
//concatenate the year.
$september_date_from = date_create(''.$year.'-09-01');
$september_date_to = date_create(''.$year.'-09-30');
$september_result_date_from = date_format($september_date_from, 'Y-m-d ');
$september_result_date_to = date_format($september_date_to, 'Y-m-d ');
//Select all matching records from the given date
$september_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$september_result_date_from'  AND '$september_result_date_to' ");
//count result
$count_september = mysqli_num_rows($september_total_violation);

//########################  OCTOBER #############################
//concatenate the year.
$october_date_from = date_create(''.$year.'-10-01');
$october_date_to = date_create(''.$year.'-10-31');
$october_result_date_from = date_format($october_date_from, 'Y-m-d ');
$october_result_date_to = date_format($october_date_to, 'Y-m-d ');
//Select all matching records from the given date
$october_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$october_result_date_from'  AND '$october_result_date_to' ");
//count result
$count_october = mysqli_num_rows($october_total_violation);

//########################  NOVEMBER #############################
//concatenate the year.
$november_date_from = date_create(''.$year.'-11-01');
$november_date_to = date_create(''.$year.'-11-30');
$november_result_date_from = date_format($november_date_from, 'Y-m-d ');
$november_result_date_to = date_format($november_date_to, 'Y-m-d ');
//Select all matching records from the given date
$november_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$november_result_date_from'  AND '$november_result_date_to' ");
//count result
$count_november = mysqli_num_rows($november_total_violation);

//########################  DECEMBER #############################
//concatenate the year.
$december_date_from = date_create(''.$year.'-12-01');
$december_date_to = date_create(''.$year.'-12-31');
$december_result_date_from = date_format($december_date_from, 'Y-m-d ');
$december_result_date_to = date_format($december_date_to, 'Y-m-d ');
//Select all matching records from the given date
$december_total_violation = mysqli_query($con, "SELECT * FROM std_violation WHERE v_date BETWEEN '$december_result_date_from'  AND '$december_result_date_to' ");
//count result
$count_december = mysqli_num_rows($december_total_violation);