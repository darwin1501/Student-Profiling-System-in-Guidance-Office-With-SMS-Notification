<?php 
// ########### GRADE 11 ###############

//********** TOTAL VIOLATION OF THE MONTH ******************
$query_total_violation_GRD11 = mysqli_query($con, "SELECT * FROM std_violation WHERE v_grd = 11 AND v_date BETWEEN '$result_date_from'  AND '$result_date_to' ");
//count the result
$total_violation_GRD11 = mysqli_num_rows($query_total_violation_GRD11);

//********** TOTAL COUNT OF MALE IN GRADE COMMITED A VIOLATION IN MONTH ******************
$query_total_male_GRD11 = mysqli_query($con, "SELECT * 
FROM std_violation INNER JOIN std_prf 
ON std_violation.lrn = std_prf.lrn WHERE gen = 'male'AND v_grd = 11 AND v_date  BETWEEN '$result_date_from'  AND '$result_date_to' ");
//count the result
$total_count_of_male_GRD11 = mysqli_num_rows($query_total_male_GRD11);

//********** TOTAL COUNT OF FEMALE COMMITED A VIOLATION IN MONTH ******************
$query_total_female_GRD11 = mysqli_query($con, "SELECT * 
FROM std_violation INNER JOIN std_prf 
ON std_violation.lrn = std_prf.lrn WHERE gen = 'female'AND v_grd = 11 AND v_date  BETWEEN '$result_date_from'  AND '$result_date_to' ");
//count the result
$total_count_of_female_GRD11 = mysqli_num_rows($query_total_female_GRD11);


//********** TOTAL COUNT OF MINOR VIOLATION IN MONTH ******************

$query_total_minor_GRD11 = mysqli_query($con, "SELECT * 
FROM std_violation INNER JOIN std_prf 
ON std_violation.lrn = std_prf.lrn WHERE v_type = 'minor' AND v_grd = 11 AND v_date  BETWEEN '$result_date_from'  AND '$result_date_to' ");
// count the result
$total_count_of_minor_GRD11 = mysqli_num_rows($query_total_minor_GRD11);

//********** TOTAL COUNT OF MAJOR VIOLATION IN MONTH ******************
//
$query_total_major_GRD11 = mysqli_query($con, "SELECT * 
FROM std_violation INNER JOIN std_prf 
ON std_violation.lrn = std_prf.lrn WHERE v_type = 'major' AND v_grd = 11 AND v_date  BETWEEN '$result_date_from'  AND '$result_date_to' ");
// count the result
$total_count_of_major_GRD11 = mysqli_num_rows($query_total_major_GRD11);